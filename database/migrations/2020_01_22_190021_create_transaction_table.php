<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction', function (Blueprint $table) {
            $table->increments('transaction_id');
            $table->integer('user_id')->unsigned();
            $table->integer('fuel_type_id')->unsigned();
            $table->integer('fuel_station_id')->unsigned();
            $table->dateTime('transaction_date_time');
            $table->decimal('number_of_litres', 10, 6);
            $table->integer('pump_number');
            $table->boolean('fuel_discount_entitlement');
            $table->string('payment_method');
            $table->unique(array('user_id', 'fuel_type_id', 'fuel_station_id', 'transaction_date_time'), 'transaction_unique_key');
            $table->foreign('user_id')
            ->references('user_id')
            ->on('user');
            $table->foreign('fuel_type_id')
            ->references('fuel_type_id')
            ->on('fuel_type');
            $table->foreign('fuel_station_id')
            ->references('fuel_station_id')
            ->on('fuel_station');
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
        Schema::dropIfExists('transaction');
    }
}
