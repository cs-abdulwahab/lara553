<?php

use App\Device;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Device seeded started :)");
        factory(Device::class, 50)->create();
        $this->command->info("Device  seeded ended :)");
    }
}
