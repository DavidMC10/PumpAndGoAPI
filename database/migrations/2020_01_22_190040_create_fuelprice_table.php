<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelpriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_price', function (Blueprint $table) {
            $table->integer('fuel_type_id')->unsigned();
            $table->integer('fuel_station_id')->unsigned();
            $table->primary(array('fuel_type_id', 'fuel_station_id'), 'fuel_price_primary_key');
            $table->foreign('fuel_type_id')
            ->references('fuel_type_id')
            ->on('fuel_type');
            $table->foreign('fuel_station_id')
            ->references('fuel_station_id')
            ->on('fuel_station');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('price_per_litre', 6, 2);
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
        Schema::dropIfExists('fuel_price');
    }
}
