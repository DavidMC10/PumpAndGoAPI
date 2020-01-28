<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'David',
            'lastName' => 'John',
            'email' => 'david.john@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 1,
            'fuelCardId' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Michael',
            'lastName' => 'Patrick',
            'email' => 'michael.patrick@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 2,
            'fuelCardId' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Steven',
            'lastName' => 'Hawkins',
            'email' => 'steven.@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 10.00,
            'maxDistanceLimit' => 10.00,
            'rewardCardId' => 3,
            'fuelCardId' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Kevin',
            'lastName' => 'Turner',
            'email' => 'kevin.turner@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 4,
            'fuelCardId' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'rachael',
            'lastName' => 'porter',
            'email' => 'rachael.porter@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 5,
            'fuelCardId' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Alyd',
            'lastName' => 'McLaughlin',
            'email' => 'alyd.mclaughlin@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 6,
            'fuelCardId' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Athan',
            'lastName' => 'Biamis',
            'email' => 'athan.biamis@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 7,
            'fuelCardId' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Nicole',
            'lastName' => 'Kerr',
            'email' => 'nicole.kerr@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 8,
            'fuelCardId' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Bill',
            'lastName' => 'Gates',
            'email' => 'bill.gates@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 9,
            'fuelCardId' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'firstName' => 'Paddy',
            'lastName' => 'Wack',
            'email' => 'paddy.wack@noreply.com',
            'password' => bcrypt('password'),
            'maxFuelLimit' => 20.00,
            'maxDistanceLimit' => 20.00,
            'rewardCardId' => 10,
            'fuelCardId' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
