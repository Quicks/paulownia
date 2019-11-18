<?php

namespace App\Helpers\Contracts;

interface Shipment
{
    public function shipment($qty, $height_tree);
}

