<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $filePath = storage_path('app/public/products');

    return [
      'name' => $faker->sentence(1, true),
      'price' => $faker->randomFloat(2, 100, 999999),
      'description' => $faker->realText(),
      'featured' => $faker->boolean(),
      'image' => $faker->image($filePath, 400, 300, null, false)
    ];
});
