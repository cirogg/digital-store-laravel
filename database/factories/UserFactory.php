<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $filePath = storage_path('app/public/avatars');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'surname' => $faker->name,
        'nickname' => $faker->name,
        'email_verified_at' => now(),
        'avatar' => $faker->image($filePath, 300, 300, null, false),
			  'country' => $faker->country,
        'city' => $faker->country,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
