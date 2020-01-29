<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password');
            $table->double('maxFuelLimit');
            $table->double('maxDistanceLimit');
            $table->integer('rewardCardId')->unsigned();
            $table->foreign('rewardCardId')->references('rewardCardID')->on('rewards')->onDelete('cascade');
            $table->integer('fuelCardId')->unsigned();
            $table->foreign('fuelCardId')->references('fuelCardId')->on('fuel_cards')->onDelete('cascade');
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
        Schema::dropIfExists('users');
    }
}
