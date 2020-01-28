<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'userId' => "1",
            'fuelTypeId' => "1",
            'fuelStationId' => "1",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 23.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "1",
            'fuelTypeId' => "1",
            'fuelStationId' => "5",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 34.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "2",
            'fuelTypeId' => "1",
            'fuelStationId' => "5",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 34.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "2",
            'fuelTypeId' => "3",
            'fuelStationId' => "7",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 40.56,
            'pumpNumber' => 2,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "3",
            'fuelTypeId' => "4",
            'fuelStationId' => "7",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 25.56,
            'pumpNumber' => 1,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "3",
            'fuelTypeId' => "4",
            'fuelStationId' => "5",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 35.56,
            'pumpNumber' => 2,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "4",
            'fuelTypeId' => "1",
            'fuelStationId' => "6",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 19.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "4",
            'fuelTypeId' => "1",
            'fuelStationId' => "9",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 29.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "5",
            'fuelTypeId' => "3",
            'fuelStationId' => "4",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 50.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "5",
            'fuelTypeId' => "3",
            'fuelStationId' => "7",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 45.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "6",
            'fuelTypeId' => "2",
            'fuelStationId' => "6",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 14.56,
            'pumpNumber' => 1,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "6",
            'fuelTypeId' => "2",
            'fuelStationId' => "3",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 30.56,
            'pumpNumber' => 1,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "7",
            'fuelTypeId' => "3",
            'fuelStationId' => "5",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 42.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "7",
            'fuelTypeId' => "3",
            'fuelStationId' => "4",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 12.56,
            'pumpNumber' => 5,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'Debit/Credit',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "8",
            'fuelTypeId' => "1",
            'fuelStationId' => "2",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 52.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "8",
            'fuelTypeId' => "1",
            'fuelStationId' => "8",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 34.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "9",
            'fuelTypeId' => "2",
            'fuelStationId' => "6",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 23.56,
            'pumpNumber' => 4,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "9",
            'fuelTypeId' => "2",
            'fuelStationId' => "10",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 45.56,
            'pumpNumber' => 3,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "10",
            'fuelTypeId' => "2",
            'fuelStationId' => "3",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 23.56,
            'pumpNumber' => 1,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transactions')->insert([
            'userId' => "10",
            'fuelTypeId' => "2",
            'fuelStationId' => "7",
            'transactionDateTime' => Carbon::now(),
            'numberOfLitres' => 60.53,
            'pumpNumber' => 2,
            'fuelDiscountEntitlement' => false,
            'paymentMethod' => 'FuelCard',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
