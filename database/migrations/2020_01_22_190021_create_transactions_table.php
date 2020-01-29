<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('userId')->unsigned();
            $table->integer('fuelTypeId')->unsigned();
            $table->integer('fuelStationId')->unsigned();
            $table->dateTime('transactionDateTime');
            $table->decimal('numberOfLitres', 6, 2);
            $table->integer('pumpNumber');
            $table->boolean('fuelDiscountEntitlement');
            $table->string('paymentMethod');
            $table->primary(array('userId', 'fuelTypeId', 'fuelStationId', 'transactionDateTime'), 'transactionPrimaryKey');
            $table->foreign('userId')
            ->references('userId')
            ->on('users');
            $table->foreign('fuelTypeId')
            ->references('fuelTypeId')
            ->on('fuel_types');
            $table->foreign('fuelStationId')
            ->references('fuelStationId')
            ->on('fuel_stations');
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
        Schema::dropIfExists('transactions');
    }
}
