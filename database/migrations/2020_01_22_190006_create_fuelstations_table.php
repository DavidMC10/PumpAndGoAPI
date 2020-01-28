<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuelstations', function (Blueprint $table) {
            $table->increments('fuelStationId');
            $table->string('name');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city/town');
            $table->decimal('longitude', 11, 8);
            $table->decimal('latitude', 10, 8);
            $table->string('telephoneNo');
            $table->integer('numberOfPumps');
            $table->integer('vatId')->unsigned();
            $table->foreign('vatId')->references('vatId')->on('vat');
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
        Schema::dropIfExists('fuelstations');
    }
}
