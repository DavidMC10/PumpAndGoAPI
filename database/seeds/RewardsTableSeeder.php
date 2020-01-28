<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rewards')->insert([
            'rewardCardNo' => '8748592034354217',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '1205723349519898',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '7255856371313870',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '5382661892151288',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '2067231187078342',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '0243821667630852',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '9633487710438288',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '0203905181894042',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '5993861341178843',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('rewards')->insert([
            'rewardCardNo' => '2648680154221281',
            'carWashDiscountPercentage' => 10.00,
            'fuelDiscountPercentage' => 15.00,
            'deliDiscountPercentage' => 10.00,
            'coffeeDiscountPercentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
