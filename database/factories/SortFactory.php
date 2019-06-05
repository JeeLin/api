<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Sort::class, function (Faker $faker) {
    return [
        'type_id' => $faker->numberBetween(1,5),
        'book_id' => $faker->numberBetween(1,50),
    ];
});
