<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelPricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "1",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "1",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "1",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.47,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "1",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "2",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "2",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.41,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "2",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "2",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "3",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.46,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "3",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.39,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "3",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.56,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "3",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "4",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "4",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "4",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.58,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "4",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "5",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "5",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.44,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "5",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "5",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "6",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.45,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "6",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "6",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.58,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "6",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.59,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "7",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "7",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "7",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.53,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "7",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "8",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "8",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.44,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "8",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "8",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.52,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "9",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "9",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.46,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "9",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "9",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "1",
            'fuelStationId' => "10",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.47,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "2",
            'fuelStationId' => "10",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.45,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "3",
            'fuelStationId' => "10",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_prices')->insert([
            'fuelTypeId' => "4",
            'fuelStationId' => "10",
            'startDate' => Carbon::now(),
            'endDate' => Carbon::now()->addDays(1),
            'pricePerLitre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
