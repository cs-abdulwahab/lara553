<?php

use Faker\Generator as Faker;

$factory->define(App\Survey::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'startdatetime' => $faker->dateTime('now'),
        'enddatetime' => $faker->dateTime('now'),

        'status' => 'active',
    ];
});
