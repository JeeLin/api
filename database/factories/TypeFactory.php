<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Type::class, function (Faker $faker) {
    return [
        'class' => $faker->name,
    ];
});
