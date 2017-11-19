<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UsersTableSeeder::class);
        // $this->call(FacultySeeder::class);

        // $this->call(DeviceSeeder::class);
        // $this->call(SensorSeeder::class);

        // $this->call(IntrusionSeeder::class);

        $this->call(ConstraintSeeder::class);

        // $this->call(UsersTableSeeder::class);
        // $this->call(QuestionSeeder::class);

        Model::reguard();

    }
}
