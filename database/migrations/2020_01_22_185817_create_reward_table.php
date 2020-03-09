<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward', function (Blueprint $table) {
            $table->increments('reward_card_id');
            $table->integer('barcode_number');
            $table->decimal('car_wash_discount_percentage', 5, 2);
            $table->decimal('fuel_discount_percentage', 5, 2);
            $table->decimal('deli_discount_percentage', 5, 2);
            $table->decimal('coffee_discount_percentage', 5, 2);
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
        Schema::dropIfExists('reward');
    }
}
