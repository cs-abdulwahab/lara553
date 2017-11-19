<?php

use Illuminate\Database\Seeder;

class IntrusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info("Intrusion Seeding started :)");

        factory(\App\Intrusion::class,50)->create();


        $this->command->info("Intrusion Seeding ended :)");

    }
}
