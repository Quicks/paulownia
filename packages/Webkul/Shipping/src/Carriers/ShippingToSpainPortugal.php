<?php

namespace Webkul\Shipping\Carriers;

use Config;
use Webkul\Checkout\Models\CartShippingRate;
use Webkul\Shipping\Facades\Shipping;
use Webkul\Checkout\Facades\Cart;
use Webkul\Product\Repositories\ProductFlatRepository;
use Illuminate\Support\Facades\DB;
use App\Helpers\Delivery;

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
        $sum = 0;
        foreach ($cart->items as $item) {
            $productId = $item->product_id;
            $product = DB::table('product_flat')->where('product_id', $productId)->first();
            $volume = $product->volume_box;
            $qty = $item->quantity;
            $height = $product->height_tree;
            if(empty ($product->height_tree)){
                $height = 0;
            }
            $delivery = new Delivery();
            $price =  $delivery->delivery($volume, $qty, $height);
//            print_r($price);
            if($price == 0) {
                $sum = 0;
                break;
            }
            $sum += $price;
        }
//        dd($sum);
        $object = new CartShippingRate;
        $object->carrier = 'shippingToSpainPortugal';
        $object->carrier_title = $this->getConfigData('title');
        $object->method = 'shippingToSpainPortugal';
        $object->method_title = $this->getConfigData('title');
        $object->method_description = $this->getConfigData('description');
        $object->price = core()->convertPrice($sum);
        $object->base_price = $sum;

        return $object;
    }
}