<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return
    [
      'is_paid' => $faker->boolean(),
      'product_id' => $faker->numberBetween(1,10),
      'user_id' => $faker->numberBetween(1,10),
    ];
});
