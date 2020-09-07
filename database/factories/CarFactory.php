<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'alias' => implode(" ", $faker->words(1)),
        'plate' => $faker->userName(1),
        'brand' => implode(" ", $faker->words(1)),
        'type' => implode(" ", $faker->words(1)),
        'model' => $faker->year(1),
        'user_id' => rand(1, 10),
    ];
});
