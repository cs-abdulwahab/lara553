<?php

use App\SensorData;
use Illuminate\Database\Seeder;

class SensorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Sensor seeded started :)");
        factory(SensorData::class, 500)->create();
        $this->command->info("Sensor  seeded ended :)");
    }
}
