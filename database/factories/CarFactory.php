<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    $brands = [ 'Audi', 'Bentley', 'BMW', 'Bugatti', 'Changan', 'GM/Chevrolet', 'Chrysler', 'Dodge', 'Fiat', 'Ferrari', 'Ford', 'Honda', 'Hyundai', 'Nissan' ];
    $brand_id = rand(0, 12);

    return [
        'alias' => $faker->word(),
        'plate' => $faker->swiftBicNumber(),
        'brand' => $brands[$brand_id],
        'type' => $faker->word(),
        'model' => $faker->year(),
        'user_id' => rand(1, 10),
    ];
});
