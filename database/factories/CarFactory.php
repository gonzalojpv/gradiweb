<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'alias' => $faker->word(),
        'plate' => $faker->swiftBicNumber(),
        'brand' => $faker->word(),
        'type' => $faker->word(),
        'model' => $faker->year(),
        'user_id' => rand(1, 10),
    ];
});
