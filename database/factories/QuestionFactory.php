<?php

use App\Survey;
use Faker\Generator as Faker;

$factory->define(App\Question::class, function (Faker $faker) {

    $surveys = Survey::pluck('id')->toArray();

    return [

        'survey_id' => $faker->randomElement($surveys),
        'statement' => 'Do you like this person =  ' . $faker->name,
        'qno' => $faker->numberBetween(0, 10000),
    ];
});
