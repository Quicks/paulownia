<?php

namespace App\Helpers;

use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\DB;
use App\Helpers\BigBox;
use App\Helpers\MediumBox;
use App\Helpers\SmallBox;
class Delivery
{
    public function delivery($volume, $qty, $height_tree = 0){

            if ($volume == 5){
                $delivery = new BigBox();
                $price = $delivery->shipment($qty, $height_tree);
            } elseif ($volume == 600) {
                $delivery = new MediumBox();
                $price = $delivery->shipment($qty);
            } elseif ($volume == 250) {
                $delivery = new SmallBox();
                $price = $delivery->shipment($qty);
            }
            else {
             $price = 0;
            }
        return $price;
    }
}