<?php

use App\Device;
use Faker\Generator as Faker;

$factory->define(App\SensorData::class, function (Faker $faker) {


    $deviceid = Device::pluck('id')->toArray();


    return [

        'temp' => $faker->numberBetween(-50, 100),
        'humidity' => $faker->numberBetween(0, 100),
        // should be GMT
        'sensor_dt' => $faker->dateTimeBetween('-1 year', 'now'),
        'device_id' => $faker->randomElement($deviceid)

    ];

});
