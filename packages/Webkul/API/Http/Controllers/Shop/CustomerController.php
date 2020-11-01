<?php

namespace Webkul\API\Http\Controllers\Shop;

use Illuminate\Support\Facades\Event;
use Webkul\Customer\Repositories\CustomerRepository;
use Webkul\Customer\Models\CustomerAddress;
use DB;
/**
 * Customer controller
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class CustomerController extends Controller
{
    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * Repository object
     *
     * @var array
     */
    protected $customerRepository;

    /**
     * @param CustomerRepository object $customer
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->_config = request('_config');

        $this->customerRepository = $customerRepository;
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return Mixed
     */
    public function create()
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'company_name' => 'required',
            'country' => 'required',
            'id_number' => 'required',
            'phone' => 'required',
            'postcode' => 'required',
            'state' => 'required',
            'email' => 'email|required|unique:customers,email',
            'password' => 'confirmed|min:6|required'
        ]);

        

        Event::fire('customer.registration.before');
        $transaction = DB::transaction(function() {
            $data = request()->input();

            $data = array_merge($data, [
                'password' => bcrypt($data['password']),
                'channel_id' => core()->getCurrentChannel()->id,
                'is_verified' => 1,
                'customer_group_id' => 1
            ]);
            $customer = $this->customerRepository->create($data);
            $address = CustomerAddress::create(array_merge(request()->all(), ['customer_id' => $customer->id]));     
            Event::fire('customer.registration.after', $customer);
        });

        return response()->json([
                'message' => 'Your account has been created successfully.'
            ]);
    }
}