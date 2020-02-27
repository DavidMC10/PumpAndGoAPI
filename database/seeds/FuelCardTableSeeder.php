<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelCardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_card')->insert([
            'fuel_card_no' => '1234891023986751',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '9967502007637999',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '3544553777288025',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '2383885647878939',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '9710249597291662',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '8232374253279340',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '9740403495021159',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '8423655541318432',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '7441452359928044',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_card')->insert([
            'fuel_card_no' => '5742827471047010',
            'expiry_month' => '11',
            'expiry_year' => '23',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
