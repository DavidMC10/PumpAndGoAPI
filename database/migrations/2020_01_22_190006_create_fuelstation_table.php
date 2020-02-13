<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelstationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_station', function (Blueprint $table) {
            $table->increments('fuel_station_id');
            $table->string('name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city_town');
            $table->decimal('longitude', 11, 8);
            $table->decimal('latitude', 10, 8);
            $table->string('telephone_no');
            $table->integer('number_of_pumps');
            $table->integer('vat_id')->unsigned();
            $table->foreign('vat_id')->references('vat_id')->on('vat');
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
        Schema::dropIfExists('fuel_station');
    }
}
