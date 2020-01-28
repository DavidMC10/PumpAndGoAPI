<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesshoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesshours', function (Blueprint $table) {
            $table->increments('businessHoursID');
            $table->integer('fuelStationID')->unsigned();
            $table->foreign('fuelStationID')->references('fuelStationID')->on('fuelstations');
            $table->string('day');
            $table->string('openTime');
            $table->string('closeTime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesshours');
    }
}
