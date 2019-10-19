<?php

namespace Webkul\Shipping\Carriers;

use Config;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Facades\Cart;
use Webkul\Product\Repositories\ProductFlatRepository;
use Illuminate\Support\Facades\DB;

/**
 * Class Rate.
 *
 */
class ShippingToSpainPortugal extends AbstractShipping
{
    /**
     * Payment method code
     *
     * @var string
     */
    protected $code  = 'shippingToSpainPortugal';

    /**
     * Returns rate for flatrate
     *
     * @return array
     */
    public function calculate()
    {
        if (! $this->isAvailable())
            return false;

        $cart = Cart::getCart();
        $productId = $cart->items[0]->product_id;
        $product = DB::table('product_flat')->where('product_id', $productId)->get();
        $deliveryUnitQty = $product[0]->delivery_unit_qty;
        $object = new CartShippingRate;


        $object->carrier = 'shippingToSpainPortugal';
        $object->carrier_title = $this->getConfigData('title');
        $object->method = 'shippingToSpainPortugal';
        $object->method_title = $this->getConfigData('title');
        $object->method_description = $this->getConfigData('description');
        $result = $cart->items_qty /$deliveryUnitQty;
        $qty_container = ceil($result);
        $object->price = core()->convertPrice($this->getConfigData('default_rate')) * $qty_container;
        $object->base_price = $this->getConfigData('default_rate') * $qty_container;

        return $object;
    }
}