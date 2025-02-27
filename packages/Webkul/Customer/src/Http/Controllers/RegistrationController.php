<?php

namespace Webkul\Customer\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Webkul\Customer\Mail\VerificationEmail;
use Illuminate\Routing\Controller;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Repositories\CustomerGroupRepository;
use Cookie;
use Webkul\Core\Repositories\SubscribersListRepository as Subscription;
use Webkul\Customer\Models\Customer;
use Webkul\Customer\Http\Listeners\CustomerEventsHandler;
use Cart;

/**
 * Registration controller
 *
 * @author    Prashant Singh <prashant.singh852@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $_config;
    protected $customer;
    protected $customerGroup;
    protected $subscription;

    /**
     * @param CustomerRepository object $customer
     */
    public function __construct(CustomerRepository $customer, CustomerGroupRepository $customerGroup, Subscription $subscription)
    {
        $this->_config = request('_config');
        $this->customer = $customer;
        $this->customerGroup = $customerGroup;
        $this->subscription = $subscription;
    }

    /**
     * Opens up the user's sign up form.
     *
     * @return view
     */
    public function show()
    {
        if (auth()->guard('customer')->check()) {
            return redirect()->route('main');
        } else {
            return view($this->_config['view']);
        }
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return Mixed
     */
    public function create(Request $request)
    {
        $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'email' => 'email|required|unique:customers,email',
            'password' => 'confirmed|min:6|required',
            // 'g-recaptcha-response' => 'recaptcha',
        ]);
        $data = request()->input();

        $data['password'] = bcrypt($data['password']);

        $data['channel_id'] = core()->getCurrentChannel()->id;

        if (core()->getConfigData('customer.settings.email.verification')) {
            $data['is_verified'] = 0;
        } else {
            $data['is_verified'] = 1;
        }

        $data['customer_group_id'] = $this->customerGroup->findOneWhere(['code' => 'general'])->id;

        $verificationData['email'] = $data['email'];
        $verificationData['token'] = md5(uniqid(rand(), true));
        $data['token'] = $verificationData['token'];

        Event::fire('customer.registration.before');

        $customer = $this->customer->create($data);

        Event::fire('customer.registration.after', $customer);

        if ($customer) {

            if (core()->getConfigData('customer.settings.email.verification')) {
                try {
                    Mail::queue(new VerificationEmail($verificationData));

                    session()->flash('success', trans('shop::app.customer.signup-form.success-verify'));
                } catch (\Exception $e) {
                    session()->flash('info', trans('shop::app.customer.signup-form.success-verify-email-unsent'));
                }
            } else {
                session()->flash('success', trans('shop::app.customer.signup-form.success'));
            }

            if($request->has('subscribe')) {
                $this->subscribe();
            }
            $this->autoLogin($request); //THIS IS AUTOLOGIN AFTER REGISTRATION
            return redirect()->back(); //redirect()->route($this->_config['redirect']);
        } else {
            session()->flash('error', trans('shop::app.customer.signup-form.failed'));
            
            return redirect()->back();
        }
    }

    /**
     * Method to verify account
     *
     * @param string $token
     */
    public function verifyAccount($token)
    {
        $customer = $this->customer->findOneByField('token', $token);

        if ($customer) {
            $customer->update(['is_verified' => 1, 'token' => 'NULL']);

            session()->flash('success', trans('shop::app.customer.signup-form.verified'));
        } else {
            session()->flash('warning', trans('shop::app.customer.signup-form.verify-failed'));
        }

        return redirect()->route('customer.session.index');
    }

    public function resendVerificationEmail($email)
    {
        $verificationData['email'] = $email;
        $verificationData['token'] = md5(uniqid(rand(), true));

        $customer = $this->customer->findOneByField('email', $email);

        $this->customer->update(['token' => $verificationData['token']], $customer->id);

        try {
            Mail::queue(new VerificationEmail($verificationData));

            if (Cookie::has('enable-resend')) {
                \Cookie::queue(\Cookie::forget('enable-resend'));
            }

            if (Cookie::has('email-for-resend')) {
                \Cookie::queue(\Cookie::forget('email-for-resend'));
            }
        } catch (\Exception $e) {
            session()->flash('error', trans('shop::app.customer.signup-form.verification-not-sent'));

            return redirect()->back();
        }
        session()->flash('success', trans('shop::app.customer.signup-form.verification-sent'));

        return redirect()->back();
    }

    public function subscribe()
    {
        $email = request()->input('email');
        $unique = 0;
        $alreadySubscribed = $this->subscription->findWhere(['email' => $email]);

        $unique = function () use ($alreadySubscribed) {
            if ($alreadySubscribed->count() > 0) {
                return 0;
            } else {
                return 1;
            }
        };

        if ($unique()) {
            $token = uniqid();
            $result = false;

            $result = $this->subscription->create([
                'email' => $email,
                'channel_id' => core()->getCurrentChannel()->id,
                'is_subscribed' => 1,
                'token' => $token
            ]);

            if (!$result) {
                session()->flash('error', trans('shop::app.subscription.not-subscribed'));
                return;
            }
        }
        return;
    }

    public function autoLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! auth()->guard('customer')->attempt(request(['email', 'password']))) {
            session()->flash('error', trans('shop::app.customer.login-form.invalid-creds'));

            return redirect()->back();
        }

        if (auth()->guard('customer')->user()->status == 0) {
            auth()->guard('customer')->logout();

            session()->flash('warning', trans('shop::app.customer.login-form.not-activated'));

            return redirect()->back();
        }

        if (auth()->guard('customer')->user()->is_verified == 0) {
            session()->flash('info', trans('shop::app.customer.login-form.verify-first'));

            Cookie::queue(Cookie::make('enable-resend', 'true', 1));

            Cookie::queue(Cookie::make('email-for-resend', $request->input('email'), 1));

            auth()->guard('customer')->logout();

            return redirect()->back();
        }

        //Event passed to prepare cart after login
        Event::fire('customer.after.login', $request->input('email'));

        session()->flash('info', trans('shop::app.customer.sucess-login'));
        return redirect()->back(); //redirect()->intended(route($this->_config['redirect']));
    }

}
