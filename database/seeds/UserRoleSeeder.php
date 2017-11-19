<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleid = Role::pluck('id')->toArray();

        $faker = Faker::create();

        factory(User::class, 10)
            ->create()
            ->each(function ($u) use ($roleid, $faker) {


                $u->roles()->attach($faker->randomElement($roleid));

            });


    }
}
