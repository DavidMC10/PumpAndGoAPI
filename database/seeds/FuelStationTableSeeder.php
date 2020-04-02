<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelStationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuel_station')->insert([
            'name' => "Circle K Brady's",
            'address1' => "15 Navan Rd, Ashtown",
            'address2' => "Ashtown, Dublin 15",
            'city_town' => 'Dublin',
            'longitude' => -6.349646,
            'latitude' => 53.378259,
            'telephone_no' => "+353 1 821 7278",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Palmerstown",
            'address1' => "Lucan-By-Pass (Dublin Bound)",
            'address2' => "Palmerstown, Dublin 20",
            'city_town' => 'Dublin',
            'longitude' => -6.375123,
            'latitude' => 53.356069,
            'telephone_no' => "+353 1 626 0620",
            'number_of_pumps' => 8,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Dundrum",
            'address1' => "14 Dundrum Rd",
            'address2' => "Churchtown Lower",
            'city_town' => 'Dublin',
            'longitude' => -6.246439,
            'latitude' => 53.294409,
            'telephone_no' => "+353 1 296 5530",
            'number_of_pumps' => 4,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Grosvenor (Rathmines)",
            'address1' => "Grosvenor Rd",
            'address2' => "Rathmines",
            'city_town' => 'Dublin',
            'longitude' => -6.268078,
            'latitude' => 53.321008,
            'telephone_no' => "+353 1 497 1551",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Nevin",
            'address1' => "Nevin",
            'address2' => "59-63 Ballymun Road",
            'city_town' => 'Ballymun',
            'longitude' => -6.266155,
            'latitude' => 53.382068,
            'telephone_no' => "+353 1 837 5800",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Martello",
            'address1' => "143 Strand Road",
            'address2' => "Sandymount, Dublin 4",
            'city_town' => 'Dublin',
            'longitude' => -6.207317,
            'latitude' => 53.324282,
            'telephone_no' => "+353 1 260 8527",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Cabra",
            'address1' => "146 Cabra Rd",
            'address2' => "Northside, Dublin 7",
            'city_town' => 'Dublin',
            'longitude' => -6.291534,
            'latitude' =>  53.361097,
            'telephone_no' => "+353 1 882 3740",
            'number_of_pumps' => 8,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('fuel_station')->insert([
            'name' => "Circle K Richmond Rd",
            'address1' => "279 Richmond Rd",
            'address2' => "Drumcondra, Dublin",
            'city_town' => 'Dublin',
            'longitude' => -6.242585,
            'latitude' =>  53.362456,
            'telephone_no' => "+353 1 806 9008",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Autobahn",
            'address1' => "89 Glasnevin Ave",
            'address2' => "Ballymun, Dublin 11",
            'city_town' => 'Dublin',
            'longitude' => -6.272450,
            'latitude' =>  53.389802,
            'telephone_no' => "+353 1 842 9656",
            'number_of_pumps' => 4,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('fuel_station')->insert([
            'name' => "Circle K Omni",
            'address1' => "Omni Park Shopping Centre, Swords Rd",
            'address2' => "Santry, Dublin",
            'city_town' => 'Dublin',
            'longitude' => -6.246932,
            'latitude' =>  53.393415,
            'telephone_no' => "+353 1 886 9500",
            'number_of_pumps' => 6,
            'vat_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
