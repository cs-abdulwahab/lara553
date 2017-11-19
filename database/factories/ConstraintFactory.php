<?php

use App\Device;
use Faker\Generator as Faker;

$factory->define(App\Constraint::class, function (Faker $faker) {

    $deviceid = Device::pluck('id')->toArray();
    // $deviceid = [33];

    // Should be unique constraint on DeviceID + Name of the Sensor
    $sensortype = ["temp", "humidity", "range", "gas", "light"];

    return [

        'name' => $faker->randomElement($sensortype),
        'min' => $faker->numberBetween(0, 20),
        'max' => $faker->numberBetween(80, 120),
        'device_id' => $faker->randomElement($deviceid)

    ];

});
