<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessHoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Monday",
            'openTime' => "9:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Tuesday",
            'openTime' => "9:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Wednesday",
            'openTime' => "9:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Thursday",
            'openTime' => "9:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Friday",
            'openTime' => "9:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Saturday",
            'openTime' => "9:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 1,
            'day' => "Sunday",
            'openTime' => "9:00am",
            'closeTime' => "8:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Monday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Tuesday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Wednesday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Thursday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Friday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Saturday",
            'openTime' => "8:00am",
            'closeTime' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 2,
            'day' => "Sunday",
            'openTime' => "8:00am",
            'closeTime' => "9:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Monday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Tuesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Wednesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Thursday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Friday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Saturday",
            'openTime' => "9:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 3,
            'day' => "Sunday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Monday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Tuesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Wednesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Thursday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Friday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Saturday",
            'openTime' => "9:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 4,
            'day' => "Sunday",
            'openTime' => "8:00am",
            'closeTime' => "7:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Monday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Tuesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Wednesday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Thursday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Friday",
            'openTime' => "8:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Saturday",
            'openTime' => "9:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 5,
            'day' => "Sunday",
            'openTime' => "8:00am",
            'closeTime' => "7:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Monday",
            'openTime' => "7:00am",
            'closeTime' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Tuesday",
            'openTime' => "7:00am",
            'closeTime' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Wednesday",
            'openTime' => "7:00am",
            'closeTime' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Thursday",
            'openTime' => "7:00am",
            'closeTime' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Friday",
            'openTime' => "7:00am",
            'closeTime' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Saturday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 6,
            'day' => "Sunday",
            'openTime' => "7:00am",
            'closeTime' => "7:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Monday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Tuesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Wednesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Thursday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Friday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Saturday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 7,
            'day' => "Sunday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Monday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Tuesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Wednesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Thursday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Friday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Saturday",
            'openTime' => "7:00am",
            'closeTime' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 8,
            'day' => "Sunday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Monday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Tuesday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Wednesday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Thursday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Friday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Saturday",
            'openTime' => "7:00am",
            'closeTime' => "11:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 9,
            'day' => "Sunday",
            'openTime' => "7:00am",
            'closeTime' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Monday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Tuesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Wednesday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Thursday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Friday",
            'openTime' => "7:00am",
            'closeTime' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Saturday",
            'openTime' => "7:00am",
            'closeTime' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuelStationId' => 10,
            'day' => "Sunday",
            'openTime' => "7:00am",
            'closeTime' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
