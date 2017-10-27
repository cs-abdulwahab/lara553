<?php

use App\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        /*
                Eloquent::unguard(true);
                Department::all()->each(
                    function ($d) {

                        factory(Employee::class, 3)->create([
                            'department_id' => $d->id,
                        ]);
                        $this->command->info("emp :)" . $d->id);
                    });

                $this->command->info("Employee table seeded :)");
                Eloquent::reguard();*/
        $this->command->info("Question table seeded started :)");
        factory(Question::class, 555)->create();
        $this->command->info("Question table seeded ended :)");


    }
}
