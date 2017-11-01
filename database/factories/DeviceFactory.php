<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Device::class, function (Faker $faker) {


//    // active , disabled , inprocess, limited , lost
//    $table->string('status');
//    $table->string('devicekey')->unique();
//    $table->string('name');
//
//    $table->unsignedInteger('user_id');


    $users = User::pluck('id')->toArray();


    return [
        'devicekey' => str_random(25),
        'name' => $faker->name(),
        'status' => $faker->randomElement(['active', 'disabled', 'inprocess', 'lost']),
        'user_id' => $faker->randomElement($users)

    ];


});
