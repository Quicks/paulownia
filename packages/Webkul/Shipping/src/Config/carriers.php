<?php

return [
    'flatrate' => [
        'code' => 'flatrate',
        'title' => 'Flat Rate',
        'description' => 'This is a flat rate',
        'active' => true,
        'default_rate' => '10',
        'type' => 'per_unit',
        'class' => 'Webkul\Shipping\Carriers\FlatRate',
    ],

    'free' => [
        'code' => 'free',
        'title' => 'Free Shipping',
        'description' => 'This is a free shipping',
        'active' => true,
        'default_rate' => '0',
        'class' => 'Webkul\Shipping\Carriers\Free',
    ],

    'paidUponReceipt' => [
        'code' => 'paidUponReceipt',
        'title' => 'Shipping to other countries (except Spain / Portugal)',
        'description' => 'Shipping of goods paid by the customer upon receipt',
        'active' => true,
        'default_rate' => '0',
        'class' => 'Webkul\Shipping\Carriers\PaidUponReceipt',
    ],

    'shippingToSpainPortugal' => [
        'code' => 'shippingToSpainPortugal',
        'title' => 'Shipping to Spain and Portugal',
        'description' => 'If the delivery amount is zero, then it is calculated individually',
        'active' => true,
        'default_rate' => '0',
        'class' => 'Webkul\Shipping\Carriers\ShippingToSpainPortugal',
    ]
];