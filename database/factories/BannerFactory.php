<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Banner::class, function (Faker $faker) {
    return [
        'image_url' => $faker->imageUrl,
    ];
});
