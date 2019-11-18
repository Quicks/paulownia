<?php

namespace App\Helpers;

use App\Helpers\Contracts\Shipment;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\DB;

class MediumBox implements Shipment
{
    public function shipment($quantity, $height_tree = 0)
    {
        $qty = $quantity;
        switch ($qty) {
            case $qty <= 24:
                $price = 15;
                break;
            case ($qty > 24 && $qty <= 48):
                $price = 23.50;
                break;
            case ($qty > 48 && $qty <= 72):
                $price = 32;
                break;
            case ($qty > 72 && $qty <= 96):
                $price = 40;
                break;
            case ($qty > 96 && $qty <= 120):
                $price = 48;
                break;
            case ($qty > 120 && $qty <= 144):
                $price = 56;
                break;
            case ($qty > 144 && $qty <= 168):
                $price = 64;
                break;
            case ($qty > 168 && $qty <= 192):
                $price = 72;
                break;
            case ($qty > 192 && $qty <= 216):
                $price = 82;
                break;
            case ($qty > 216 && $qty <= 240):
                $price = 89;
                break;
            case ($qty > 240 && $qty <= 264):
                $price = 96;
                break;
            case ($qty > 264 && $qty <= 288):
                $price = 103.50;
                break;
            case ($qty > 288 && $qty <= 312):
                $price = 113.50;
                break;
            case ($qty > 312 && $qty <= 336):
                $price = 120.50;
                break;
            case ($qty > 336 && $qty <= 360):
                $price = 127;
                break;
            case ($qty > 360 && $qty <= 384):
                $price = 130;
                break;
            default:
                $price = 0;
                break;
        }
        return $price;
    }
}