<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
			'Tecnología',
			'Perifericos',
			'Monitores',
			'Mouse',
			'Auriculares',
			'Router',
			'Juegos',
			'Teclados',
			'Parlantes',
			'Laptops',
			]),
		'icon' => $faker->unique()->randomElement([
			'fas fa-mobile-alt',
			'fas fa-laptop',
			'fas fa-headphones-alt',
			'fas fa-gamepad',
			'fas fa-keyboard',
			'far fa-clock',
			'fas fa-desktop',
			'fas fa-volume-up',
			'fas fa-broadcast-tower',
			'fas fa-camera-retro'
		])		
    ];
});
