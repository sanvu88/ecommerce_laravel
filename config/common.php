<?php

return [
    'product' => [
        'status' => [
            1 => 'Còn hàng',
            0 => 'Hết hàng',
        ],
        'weight_unit' => [
            1 => 'Gram',
            2 => 'Kilogram',
        ],
        'dimension_unit' => [
            1 => 'Millimeter',
            2 => 'Centimeter',
            3 => 'Meter',
        ],
        'virtual' => [
            1 => 'Physical',
            2 => 'Download',
            3 => 'Only view',
            4 => 'Service',
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
            1 => 'active',
            0 => 'unActive'
        ],
    ],
    'coupon_type' => [
        'fixed' => 1,
        'percent' => 2,
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
