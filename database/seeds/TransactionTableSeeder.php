<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction')->insert([
            'user_Id' => "1",
            'fuel_type_id' => "1",
            'fuel_station_id' => "1",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 23.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "1",
            'fuel_type_id' => "1",
            'fuel_station_id' => "5",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 34.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "2",
            'fuel_type_id' => "1",
            'fuel_station_id' => "5",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 34.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "2",
            'fuel_type_id' => "3",
            'fuel_station_id' => "7",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 40.560000,
            'pump_number' => 2,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "3",
            'fuel_type_id' => "4",
            'fuel_station_id' => "7",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 25.560000,
            'pump_number' => 1,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "3",
            'fuel_type_id' => "4",
            'fuel_station_id' => "5",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 35.560000,
            'pump_number' => 2,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "4",
            'fuel_type_id' => "1",
            'fuel_station_id' => "6",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 19.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "4",
            'fuel_type_id' => "1",
            'fuel_station_id' => "9",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 29.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "5",
            'fuel_type_id' => "3",
            'fuel_station_id' => "4",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 50.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "5",
            'fuel_type_id' => "3",
            'fuel_station_id' => "7",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 45.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "6",
            'fuel_type_id' => "2",
            'fuel_station_id' => "6",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 14.560000,
            'pump_number' => 1,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "6",
            'fuel_type_id' => "2",
            'fuel_station_id' => "3",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 30.560000,
            'pump_number' => 1,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "7",
            'fuel_type_id' => "3",
            'fuel_station_id' => "5",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 42.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "7",
            'fuel_type_id' => "3",
            'fuel_station_id' => "4",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 12.560000,
            'pump_number' => 5,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "8",
            'fuel_type_id' => "1",
            'fuel_station_id' => "2",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 52.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "8",
            'fuel_type_id' => "1",
            'fuel_station_id' => "8",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 34.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "9",
            'fuel_type_id' => "2",
            'fuel_station_id' => "6",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 23.560000,
            'pump_number' => 4,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "9",
            'fuel_type_id' => "2",
            'fuel_station_id' => "10",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 45.560000,
            'pump_number' => 3,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "10",
            'fuel_type_id' => "2",
            'fuel_station_id' => "3",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 23.560000,
            'pump_number' => 1,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaction')->insert([
            'user_Id' => "10",
            'fuel_type_id' => "2",
            'fuel_station_id' => "7",
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => 60.530000,
            'pump_number' => 2,
            'fuel_discount_entitlement' => false,
            'payment_method' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
