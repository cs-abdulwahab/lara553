<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Role::create(['name'=>'admin','description'=>'everything']);
        Role::create(['name'=>'moderator','description'=>'moderator']);
        Role::create(['name'=>'user','description'=>'client']);

    }
}
