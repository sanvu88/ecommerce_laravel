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
    'pagination' => 12,
    'coupon_type' => [
        'expired' => 0,
        'fixed' => 1,
        'percent' => 2,
    ],
    'order' => [
        'status' => [
            'ordered' => 1,
        ]
    ]
];
