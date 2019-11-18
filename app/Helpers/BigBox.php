<?php

namespace App\Helpers;

use App\Helpers\Contracts\Shipment;
use Webkul\Product\Repositories\ProductRepository as Product;
use Webkul\Checkout\Facades\Cart;
use Illuminate\Support\Facades\DB;

class BigBox implements Shipment
{
    public function shipment($qty, $height_tree)
    {
        if ($height_tree < 60) {
            switch ($qty) {
                case $qty <= 4:
                    $price = 15;
                    break;
                case ($qty > 4 && $qty <= 8):
                    $price = 23.50;
                    break;
                case ($qty > 8 && $qty <= 12):
                    $price = 32;
                    break;
                case ($qty > 12 && $qty <= 16):
                    $price = 40;
                    break;
                case ($qty > 16 && $qty <= 20):
                    $price = 48;
                    break;
                case ($qty > 20 && $qty <= 24):
                    $price = 56;
                    break;
                case ($qty > 24 && $qty <= 28):
                    $price = 64;
                    break;
                case ($qty > 28 && $qty <= 32):
                    $price = 72;
                    break;
                case ($qty > 32 && $qty <= 36):
                    $price = 82;
                    break;
                case ($qty > 36 && $qty <= 40):
                    $price = 89;
                    break;
                case ($qty > 40 && $qty <= 44):
                    $price = 96;
                    break;
                case ($qty > 44 && $qty <= 48):
                    $price = 103.50;
                    break;
                case ($qty > 48 && $qty <= 52):
                    $price = 113.50;
                    break;
                case ($qty > 52 && $qty <= 56):
                    $price = 120.50;
                    break;
                case ($qty > 56 && $qty <= 60):
                    $price = 127;
                    break;
                case ($qty > 60 && $qty <= 64):
                    $price = 130;
                    break;
                default:
                    $price = 0;
                    break;
            }
            return $price;
        }
        if ($height_tree >= 60) {
            switch ($qty) {
                case $qty <= 4:
                    $price = 22.50;
                    break;
                case ($qty > 4 && $qty <= 8):
                    $price = 38;
                    break;
                case ($qty > 8 && $qty <= 12):
                    $price = 52;
                    break;
                case ($qty > 12 && $qty <= 16):
                    $price = 65;
                    break;
                case ($qty > 16 && $qty <= 20):
                    $price = 77.50;
                    break;
                case ($qty > 20 && $qty <= 24):
                    $price = 89.50;
                    break;
                default:
                    $price = 0;
                    break;
            }
            return $price;
        }
    }
}