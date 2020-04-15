<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Context\Product\Models\Product;
use App\Support\ValueObjects\ProductUuid;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uuid' => ProductUuid::create(),
        'capacity' => $faker->numberBetween(1, 5),
    ];
});
