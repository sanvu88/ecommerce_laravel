<?php

return [
    'product' => [
        'status' => [
            'active' => 1,
            'unActive' => 0,
        ],
        'weight_unit' => [
            'gram' => 1,
            'kilogram' => 2,
        ],
        'dimension_unit' => [
            'millimeter' => 1,
            'centimeter' => 2,
            'meter' => 3,
        ],
        'virtual' => [
            'physical' => 1,
            'download' => 2,
            'only_view' => 3,
            'service' => 4,
        ],
    ],
    'pagination' => [
        'backend' => 10,
        'frontend' => 12,
    ],
    'coupon' => [
        'type' => [
            'fixed' => 1,
            'percent' => 2,
        ],
        'status' => [
            'active' => 1,
            'unActive' => 0,
        ],
    ],
    'order' => [
        'status' => [
            'ordered' => 1,
        ],
    ],
    'cart' => [
        'shipping' => 20000,
    ],
];
