<?php

namespace App\Http\Controllers;;

use Webkul\Shop\Http\Controllers\Controller;
use Webkul\Checkout\Facades\Cart;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Payment\Facades\Payment;
use Webkul\Checkout\Http\Requests\CustomerAddressForm;
use Webkul\Sales\Repositories\OrderRepository;
use Webkul\Discount\Helpers\CouponAbleRule as Coupon;
use Webkul\Discount\Helpers\NonCouponAbleRule as NonCoupon;
use Webkul\Discount\Helpers\ValidatesDiscount;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;

use Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

/**
 * Chekout controller for the customer and guest for placing order
 *
 * @author  Jitendra Singh <jitendra@webkul.com> @jitendra-webkul
 * @author  Prashant Singh <prashant.singh852@webkul.com> @prashant-webkul
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class CheckoutController extends Controller
{
    /**
     * OrderRepository object
     *
     * @var array
     */
    protected $orderRepository;

    /**
     * Contains route related configuration
     *
     * @var array
     */
    protected $_config;

    /**
     * CouponAbleRule instance object
     *
     */
    protected $coupon;

    /**
     * NoncouponAbleRule instance object
     *
     */
    protected $nonCoupon;

    /**
     * ValidatesDiscount instance object
     */
    protected $validatesDiscount;

    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Attribute\Repositories\OrderRepository  $orderRepository
     * @return void
     */
    public function __construct(
        OrderRepository $orderRepository,
        Coupon $coupon,
        NonCoupon $nonCoupon,
        ValidatesDiscount $validatesDiscount
    )
    {
        $this->coupon = $coupon;

        $this->nonCoupon = $nonCoupon;

        $this->orderRepository = $orderRepository;

        $this->validatesDiscount = $validatesDiscount;

        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
      $cart = Cart::getCart();
      $rules = [];
      $data = [];
      if(empty($cart)){
        return redirect()->to('/');
      }
      foreach ($cart->items as $item) {
        
        $productId = $item->product_id;
        $product = DB::table('product_flat')->where('product_id', $productId)->get();
				$minOrder = $product[0]->min_order_qty;
				$data[$item->name] = $item->quantity;
            $rules[$item->name] = 'required|numeric|min:' . $minOrder;
        }
			
      $validator = Validator::make($data, $rules);
			if ($validator->fails()) {
					return redirect()->route('public.cart.index')
							->withErrors($validator->errors()->messages())
							->withInput();
			}
      if (Cart::hasError())
          return redirect()->route('public.cart.index');
      $this->nonCoupon->apply();

      return view('public.check-out.index')
        ->with(
          [
            'cart' => Cart::getCart(),
            'paymentMethods' => Payment::getPaymentMethods(),
            'shippingMethods' => Shipping::getActiveShippments(),
            'rates' => Shipping::getRates()
          ]
        );
    }

    /**
     * Return order short summary
     *
     * @return \Illuminate\Http\Response
    */
    public function summary()
    {
        $cart = Cart::getCart();

        return response()->json([
                'html' => view('shop::checkout.total.summary', compact('cart'))->render()
            ]);
    }

    /**
     * Saves customer address.
     *
     * @param  \Webkul\Checkout\Http\Requests\CustomerAddressForm $request
     * @return \Illuminate\Http\Response
    */
    public function saveAddress(CustomerAddressForm $request)
    {
        $data = request()->all();

        $data['billing']['address1'] = implode(PHP_EOL, array_filter($data['billing']['address1']));
        $data['shipping']['address1'] = implode(PHP_EOL, array_filter($data['shipping']['address1']));

        if (Cart::hasError() || !Cart::saveCustomerAddress($data) || ! $rates = Shipping::collectRates())
            return response()->json(['redirect_url' => route('public.cart.index')], 403);

        $this->nonCoupon->apply();

        Cart::collectTotals();

        return response()->json($rates);
    }

    /**
     * Saves shipping method.
     *
     * @return \Illuminate\Http\Response
    */
    public function saveShipping()
    {
        $shippingMethod = request()->get('shipping_method');

        if (Cart::hasError() || !$shippingMethod || !Cart::saveShippingMethod($shippingMethod))
            return response()->json(['redirect_url' => route('public.cart.index')], 403);

        $this->nonCoupon->apply();

        Cart::collectTotals();

        return response()->json(Payment::getSupportedPaymentMethods());
    }

    /**
     * Saves payment method.
     *
     * @return \Illuminate\Http\Response
    */
    public function savePayment()
    {
        $payment = request()->get('payment');

        if (Cart::hasError() || !$payment || !Cart::savePaymentMethod($payment))
            return response()->json(['redirect_url' => route('public.cart.index')], 403);

        $this->nonCoupon->apply();

        $this->nonCoupon->checkOnShipping(Cart::getCart());

        Cart::collectTotals();

        $cart = Cart::getCart();

        return response()->json([
            'jump_to_section' => 'review',
            'html' => view('public.check-out.review', compact('cart'))->render()
        ]);
    }

    /**
     * Saves order.
     *
     * @return \Illuminate\Http\Response
    */
    public function saveOrder()
    {
        if (Cart::hasError())
            return response()->json(['redirect_url' => route('public.cart.index')], 403);

        Cart::collectTotals();

        $this->validateOrder();

        $cart = Cart::getCart();

        if ($redirectUrl = Payment::getRedirectUrl($cart)) {
            return response()->json([
                'success' => true,
                'redirect_url' => $redirectUrl
            ]);
        }

        $order = $this->orderRepository->create(Cart::prepareDataForOrder());

        Cart::deActivateCart();

        session()->flash('order', $order);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Order success page
     *
     * @return \Illuminate\Http\Response
    */
    public function success()
    {
        if (! $order = session('order'))
            return redirect()->route('public.cart.index');

        return view('public.check-out.success', compact('order'));
    }

    /**
     * Validate order before creation
     *
     * @return mixed
     */
    public function validateOrder()
    {
        $cart = Cart::getCart();

        $this->validatesDiscount->validate($cart);

        if (! $cart->shipping_address) {
            throw new \Exception(trans('Please check shipping address.'));
        }

        if (! $cart->billing_address) {
            throw new \Exception(trans('Please check billing address.'));
        }

        if (! $cart->selected_shipping_rate) {
            throw new \Exception(trans('Please specify shipping method.'));
        }

        if (! $cart->payment) {
            throw new \Exception(trans('Please specify payment method.'));
        }
    }

    /**
     * To apply couponable rule requested
     *
     * @return JSON
     */
    public function applyCoupon()
    {
        $this->validate(request(), [
            'code' => 'string|required'
        ]);

        $code = request()->input('code');

        $result = $this->coupon->apply($code);

        if ($result) {
            Cart::collectTotals();

            return response()->json([
                'success' => true,
                'message' => trans('shop::app.checkout.total.coupon-applied'),
                'result' => $result
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => trans('shop::app.checkout.total.cannot-apply-coupon'),
                'result' => null
            ], 422);
        }

        return $result;
    }

    /**
     * Initiates the removal of couponable cart rule
     *
     * @return Void
     */
    public function removeCoupon()
    {
        $result = $this->coupon->remove();

        if ($result) {
            Cart::collectTotals();

            return response()->json([
                    'success' => true,
                    'message' => trans('admin::app.promotion.status.coupon-removed'),
                    'data' => [
                        'grand_total' => core()->currency(Cart::getCart()->grand_total)
                    ]
                ], 200);
        } else {
            return response()->json([
                    'success' => false,
                    'message' => trans('admin::app.promotion.status.coupon-remove-failed'),
                    'data' => null
                ], 422);
        }
    }
}