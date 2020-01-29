<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 1234891023986751,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 9967502007637999,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 3544553777288025,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 2383885647878939,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 9710249597291662,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 8232374253279340,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 9740403495021159,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 8423655541318432,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 7441452359928044,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_cards')->insert([
            'fuelCardNo' => 5742827471047010,
            'expiryDate' => Carbon::now()->addYears(2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
