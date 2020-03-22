<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'category_id' => mt_rand(1, 50),
        'price' => $faker->randomFloat(2, 200, 10000),
        'title' => $faker->jobTitle,
        'description' => $faker->text,
        'photo_path' => 'img/cover/game-'.mt_rand(1, 9).'.jpg'
    ];
});
