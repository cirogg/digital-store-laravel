<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Brand;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
      'name' => $faker->unique()->randomElement([
        'Samsung',
        'RedDragon',
        'Apple',
        'Corsair',
        'Asus',
        'LG',
        'BMW',
        'Steelseries',
        'Logitech',
        'Razer'
]),
    ];
});
