<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RewardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reward')->insert([
            'barcode_number' => 288979,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 478404,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 934269,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 941056,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 697156,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 432289,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 179435,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 623591,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 223736,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('reward')->insert([
            'barcode_number' => 745902,
            'car_wash_discount_percentage' => 10.00,
            'fuel_discount_percentage' => 15.00,
            'deli_discount_percentage' => 10.00,
            'coffee_discount_percentage' => 10.00,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
