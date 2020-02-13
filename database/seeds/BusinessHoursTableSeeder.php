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
            'fuel_station_id' => 1,
            'day' => "Monday",
            'open_time' => "9:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Tuesday",
            'open_time' => "9:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Wednesday",
            'open_time' => "9:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Thursday",
            'open_time' => "9:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Friday",
            'open_time' => "9:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Saturday",
            'open_time' => "9:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 1,
            'day' => "Sunday",
            'open_time' => "9:00am",
            'close_time' => "8:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Monday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Tuesday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Wednesday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Thursday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Friday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Saturday",
            'open_time' => "8:00am",
            'close_time' => "12:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 2,
            'day' => "Sunday",
            'open_time' => "8:00am",
            'close_time' => "9:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Monday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Tuesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Wednesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Thursday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Friday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Saturday",
            'open_time' => "9:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 3,
            'day' => "Sunday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Monday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Tuesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Wednesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Thursday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Friday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Saturday",
            'open_time' => "9:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 4,
            'day' => "Sunday",
            'open_time' => "8:00am",
            'close_time' => "7:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Monday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Tuesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Wednesday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Thursday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Friday",
            'open_time' => "8:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Saturday",
            'open_time' => "9:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 5,
            'day' => "Sunday",
            'open_time' => "8:00am",
            'close_time' => "7:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Monday",
            'open_time' => "7:00am",
            'close_time' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Tuesday",
            'open_time' => "7:00am",
            'close_time' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Wednesday",
            'open_time' => "7:00am",
            'close_time' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Thursday",
            'open_time' => "7:00am",
            'close_time' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Friday",
            'open_time' => "7:00am",
            'close_time' => "10:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Saturday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 6,
            'day' => "Sunday",
            'open_time' => "7:00am",
            'close_time' => "7:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Monday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Tuesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Wednesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Thursday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Friday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Saturday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 7,
            'day' => "Sunday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Monday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Tuesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Wednesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Thursday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Friday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Saturday",
            'open_time' => "7:00am",
            'close_time' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 8,
            'day' => "Sunday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Monday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Tuesday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Wednesday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Thursday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Friday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Saturday",
            'open_time' => "7:00am",
            'close_time' => "11:30pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 9,
            'day' => "Sunday",
            'open_time' => "7:00am",
            'close_time' => "10:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Monday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Tuesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Wednesday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Thursday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Friday",
            'open_time' => "7:00am",
            'close_time' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Saturday",
            'open_time' => "7:00am",
            'close_time' => "00:00am",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('business_hours')->insert([
            'fuel_station_id' => 10,
            'day' => "Sunday",
            'open_time' => "7:00am",
            'close_time' => "11:00pm",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
