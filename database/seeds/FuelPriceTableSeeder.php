<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "1",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "1",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "1",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.47,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "1",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "2",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "2",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.41,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "2",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "2",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.50,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "3",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.46,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "3",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.39,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "3",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.56,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "3",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "4",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "4",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "4",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.58,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "4",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "5",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "5",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.44,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "5",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "5",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "6",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.45,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "6",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "6",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.58,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "6",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.59,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "7",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.42,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "7",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "7",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.53,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "7",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "8",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.40,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "8",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.44,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "8",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "8",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.52,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "9",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.43,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "9",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.46,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "9",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "9",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.55,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "1",
            'fuel_station_id' => "10",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.47,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "2",
            'fuel_station_id' => "10",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.45,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "3",
            'fuel_station_id' => "10",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.54,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_price')->insert([
            'fuel_type_id' => "4",
            'fuel_station_id' => "10",
            'start_date' => Carbon::now(),
            'end_date' => Carbon::now()->addDays(1),
            'price_per_litre' => 1.57,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
