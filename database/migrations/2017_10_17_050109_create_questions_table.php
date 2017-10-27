<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('statement');
            // Question Number  usefull for sorting
            $table->integer('qno');
            $table->integer('survey_id')->unsigned();;

            $table->timestamps();
        });

        Schema::table('questions', function (Blueprint $table) {

            $table->foreign('survey_id')->references('id')->on('surveys');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
