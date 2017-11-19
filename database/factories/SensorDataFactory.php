<?php

use App\Device;
use Faker\Generator as Faker;

$factory->define(App\SensorData::class, function (Faker $faker) {


//    $deviceid = Device::pluck('id')->toArray();
      $deviceid = [33];


    return [

        'temp' => $faker->numberBetween(20, 80),
        'humidity' => $faker->numberBetween(20, 100),
        // should be GMT
        'sensor_dt' => $faker->dateTimeBetween('-1 year', 'now'),
        'device_id' => $faker->randomElement($deviceid)

    ];

});
