<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AppModelsSku;
use Faker\Generator as Faker;

$factory->define(\App\Models\Sku::class, function (Faker $faker) {
    return [
        'product_id' => factory(\App\Models\Product::class, 1)->make(),
        'code' => 'AGL' . str_pad($faker->randomNumber(4), 4, '1'),
        'stock' => $faker->randomElement(range(0, 100, 10)),
        'price' => $faker->randomElement(range(4000, 9000, 100))
    ];
});
