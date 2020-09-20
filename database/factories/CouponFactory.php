<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    $type = rand(1, 2);

    if ($type == 1) {
        $value = rand(1000, 10000);
    } else {
        $value = rand(5, 30);
    }

    return [
        'code' => $faker->swiftBicNumber,
        'type' => $type,
        'value' => $value,
        'status' => 1,
    ];
});