<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'openid' => $faker->randomNumber,
        'nickname' => $faker->name,
        'avatar_url' => $faker->imageurl,
        'status' =>$faker->numberBetween(1,3),
        'phone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'image_url' => $faker->imageurl
    ];
});
