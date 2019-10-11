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
        'description' => 'The cost of 20 euros per package',
        'active' => true,
        'default_rate' => '20',
        'class' => 'Webkul\Shipping\Carriers\ShippingToSpainPortugal',
    ]
];