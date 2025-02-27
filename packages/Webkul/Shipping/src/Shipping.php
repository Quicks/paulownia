<?php

namespace Webkul\Shipping;

use Illuminate\Support\Facades\Config;
use Webkul\Checkout\Facades\Cart;
use Webkul\API\Http\Resources\Checkout\CartShippingRate as CartShippingRateResource;

/**
 * Class Shipping.
 *
 */
class Shipping
{
    /**
     * Rates
     *
     * @var array
     */
    protected $rates = [];

    /**
     * Collects rate from available shipping methods
     *
     * @return array
     */
    public function collectRates()
    {
        if (! $cart = Cart::getCart())
            return false;

        $this->removeAllShippingRates();

        foreach (Config::get('carriers') as $shippingMethod) {
            $object = new $shippingMethod['class'];

            if ($rates = $object->calculate()) {
                if (is_array($rates)) {
                    $this->rates = array_merge($this->rates, $rates);
                } else {
                    $this->rates[] = $rates;
                }
            }
        }

        $this->saveAllShippingRates();

        return [
                'jump_to_section' => 'shipping',
                'html' => view('shop::checkout.onepage.shipping', ['shippingRateGroups' => $this->getGroupedAllShippingRates()])->render()
            ];
    }

    /**
     * Persist shipping rate to database
     *
     * @return void
     */
    public function removeAllShippingRates()
    {
        if (! $cart = Cart::getCart())
            return;

        foreach ($cart->shipping_rates()->get() as $rate) {
            $rate->delete();
        }
    }

    public function getActiveShippments(){
        return array_filter(Config::get('carriers'), function($item){
            return $item['active'];
        });
    }

    /**
     * Persist shipping rate to database
     *
     * @return void
     */
    public function saveAllShippingRates()
    {
        if (! $cart = Cart::getCart())
            return;

        if (! $shippingAddress = $cart->shipping_address)
            return;
        foreach ($this->rates as $rate) {
            $rate->cart_address_id = $shippingAddress->id;

            $rate->save();
        }
    }

    /**
     * Returns shipping rates, grouped by shipping method
     *
     * @return void
     */
    public function getGroupedAllShippingRates()
    {
        $rates = [];

        foreach ($this->rates as $rate) {
            if (! isset($rates[$rate->carrier])) {
                $rates[$rate->carrier] = [
                    'carrier_title' => $rate->carrier_title,
                    'carrier' => $rate->carrier,
                    'rates' => []
                ];
            }

            $rates[$rate->carrier]['rates'][] = $rate;
        }

        return $rates;
    }

    public function getRates(){
        self::collectRates();

        $rates = [];
        
        foreach (Shipping::getGroupedAllShippingRates() as $code => $shippingMethod) {
            $rates[] = [
                'carrier_title' => $shippingMethod['carrier_title'],
                'code' => $shippingMethod['carrier'],
                'rates' => CartShippingRateResource::collection(collect($shippingMethod['rates']))
            ];
        }
        return $rates;

    }
}