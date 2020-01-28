<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewards', function (Blueprint $table) {
            $table->increments('rewardCardId');
            $table->string('rewardCardNo', 16);
            $table->decimal('carWashDiscountPercentage', 5, 2);
            $table->decimal('fuelDiscountPercentage', 5, 2);
            $table->decimal('deliDiscountPercentage', 5, 2);
            $table->decimal('coffeeDiscountPercentage', 5, 2);
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
        Schema::dropIfExists('rewards');
    }
}
