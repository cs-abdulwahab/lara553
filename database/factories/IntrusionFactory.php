<?php

use App\Device;
use Faker\Generator as Faker;

$factory->define(App\Intrusion::class, function (Faker $faker) {

    $deviceid = Device::pluck('id')->toArray();

    return [

        'alert' => 1,
        'device_id' => $faker->randomElement($deviceid)

    ];
});
