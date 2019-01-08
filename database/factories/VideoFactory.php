<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Video::class, function (Faker $faker) {
    return [
        // 'order' => $faker->numberBetween(1,10),
        'book_id' => $faker->numberBetween(1,50),
        'catalog' => $faker->sentence,
        'video_url' => $faker->url,
        'video_code' => $faker->numberBetween(20001,99999),
    ];
});
