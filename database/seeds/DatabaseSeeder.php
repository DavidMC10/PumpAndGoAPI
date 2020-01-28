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
            FuelCardsTableSeeder::class,
            RewardsTableSeeder::class,
            UsersTableSeeder::class,
            VatTableSeeder::class,
            FuelTypesTableSeeder::class,
            FuelStationsTableSeeder::class,
            TransactionsTableSeeder::class,
            FuelPricesTableSeeder::class,
            BusinessHoursTableSeeder::class,
        ]);
    }
}
