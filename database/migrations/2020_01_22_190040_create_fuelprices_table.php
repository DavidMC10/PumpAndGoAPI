<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelprices', function (Blueprint $table) {
            $table->integer('fuelTypeId')->unsigned();
            $table->integer('fuelStationId')->unsigned();
            $table->primary(array('fuelTypeId', 'fuelStationId'));
            $table->foreign('fuelTypeId')
            ->references('fuelTypeId')
            ->on('fueltypes');
            $table->foreign('fuelStationId')
            ->references('fuelStationId')
            ->on('fuelstations');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->decimal('pricePerLitre', 6, 2);
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
        Schema::dropIfExists('fuelprices');
    }
}
