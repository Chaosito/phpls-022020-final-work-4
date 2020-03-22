<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'creator_id' => mt_rand(1, 50),
        'title' => $faker->realText(20),
        'description' => $faker->realText(200),
        'image_path' => 'img/cover/game-'.mt_rand(1, 9).'.jpg',
    ];
});
