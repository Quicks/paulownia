<?php

namespace App\Helpers;


class SmallBox
{
    public function shipment($quantity, $height_tree = 0)
    {
        $qty = $quantity;
        switch ($qty) {
            case $qty <= 40:
                $price = 15;
                break;
            case ($qty > 40 && $qty <= 80):
                $price = 23.50;
                break;
            case ($qty > 80 && $qty <= 120):
                $price = 32;
                break;
            case ($qty > 120 && $qty <= 160):
                $price = 40;
                break;
            case ($qty > 160 && $qty <= 200):
                $price = 48;
                break;
            case ($qty > 200 && $qty <= 240):
                $price = 56;
                break;
            case ($qty > 240 && $qty <= 280):
                $price = 64;
                break;
            case ($qty > 280 && $qty <= 320):
                $price = 72;
                break;
            case ($qty > 320 && $qty <= 360):
                $price = 82;
                break;
            case ($qty > 360 && $qty <= 400):
                $price = 89;
                break;
            case ($qty > 400 && $qty <= 440):
                $price = 96;
                break;
            case ($qty > 440 && $qty <= 480):
                $price = 103.50;
                break;
            case ($qty > 480 && $qty <= 520):
                $price = 113.50;
                break;
            case ($qty > 520 && $qty <= 560):
                $price = 120.50;
                break;
            case ($qty > 560 && $qty <= 600):
                $price = 127;
                break;
            case ($qty > 600 && $qty <= 640):
                $price = 130;
                break;
            default:
                $price = 0;
                break;
        }
        return $price;
    }
}