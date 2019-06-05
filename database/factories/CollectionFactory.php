<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Collection::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'book_id' => $faker->numberBetween(1,50),
    ];
});
