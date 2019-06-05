<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Log::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1,10),
        'book_id' => $faker->numberBetween(1,50),
        'score' => $faker->numberBetween(-5,+5)
    ];
});
