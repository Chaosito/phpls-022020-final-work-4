<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Orders::class, function (Faker $faker) {
    return [
        'user_id' => mt_rand(1, 50),
        'product_id' => mt_rand(1, 50),
        'capacity' => mt_rand(1, 3),
        'user_mail' => $faker->email,
        'user_name' => $faker->firstName
    ];
});
