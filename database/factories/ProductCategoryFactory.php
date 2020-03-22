<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\ProductCategories::class, function (Faker $faker) {
    $genres = [
        'Action', 'RPG', 'Квесты', 'Онлайн-игры', 'Стратегии', 'Головоломки',
        'Extreme', 'Fighting', 'Flight', 'Platform', 'Racing', 'Sports',
        'Puzzle', 'Stealth', 'Survival', 'FPS', 'MMO', 'RTS',
    ];

    return [
        'title' => $genres[mt_rand(0, count($genres) - 1)],
        'description' => $faker->realText(255)
    ];
});
