<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('stripe_customer_id')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            $table->double('max_fuel_limit');
            $table->double('max_distance_limit');
            $table->integer('reward_card_id')->unsigned();
            $table->foreign('reward_card_id')->references('reward_card_id')->on('reward')->onDelete('cascade');
            $table->integer('fuel_card_id')->unsigned();
            $table->foreign('fuel_card_id')->references('fuel_card_id')->on('fuel_card')->onDelete('cascade');
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
        Schema::dropIfExists('user');
    }
}
