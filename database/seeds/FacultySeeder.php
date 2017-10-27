<?php

use App\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info("Faculty seeded started :)");
        factory(Faculty::class, 50)->create();
        $this->command->info("Faculty  seeded ended :)");
    }
}
