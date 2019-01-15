<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Book::class, function (Faker $faker) {
    return [
        'cover_url' => $faker->imageurl,
        'title' => $faker->name,
        'author' => $faker->name,
        'price' => $faker->randomFloat(2,0.00,10000.00),
        'press' => $faker->sentence,
        'published_date' => $faker->date(),
        'ISBN' => $faker->isbn13,
        'introduction' => $faker->sentence,
        'type_id' => $faker->numberBetween(1,100),
        'book_code' => $faker->numberBetween(0,9999),
        'status' =>$faker->numberBetween(0,1)
    ];
});
