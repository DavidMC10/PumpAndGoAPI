<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FuelCardTableSeeder::class,
            RewardTableSeeder::class,
            UserTableSeeder::class,
            VatTableSeeder::class,
            FuelTypeTableSeeder::class,
            FuelStationTableSeeder::class,
            TransactionTableSeeder::class,
            FuelPriceTableSeeder::class,
            BusinessHoursTableSeeder::class,
        ]);
    }
}
