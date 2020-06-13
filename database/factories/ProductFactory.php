<?php

/** @var Factory $factory */

use App\Models\Product;
use Bezhanov\Faker\Provider\Commerce;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, function (Faker $faker) {

    /** @var Faker|Commerce */
    $faker->addProvider(new Commerce($faker));

    /** @noinspection PhpUndefinedMethodInspection */
    return [
        'name' => $faker->productName(),
        'price' => null,
        'in_stock' => true,
    ];
});
