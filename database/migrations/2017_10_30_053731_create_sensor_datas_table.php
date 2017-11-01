<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::disableForeignKeyConstraints();
        Schema::create('sensor_datas', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('temp');
            $table->integer('humidity');
            $table->unsignedInteger('device_id');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');

            $table->timestamps();

        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_datas');
    }
}
