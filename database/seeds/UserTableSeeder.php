<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->insert([
            'channel_id' => 288979,
            'first_name' => 'David',
            'last_name' => 'John',
            'email' => 'david.john@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 1,
            'fuel_card_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 288978,
            'first_name' => 'Michael',
            'last_name' => 'Patrick',
            'email' => 'michael.patrick@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 2,
            'fuel_card_id' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 288348,
            'first_name' => 'Steven',
            'last_name' => 'Hawkins',
            'email' => 'steven.@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 10.00,
            'max_distance_limit' => 10.00,
            'reward_card_id' => 3,
            'fuel_card_id' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 288878,
            'first_name' => 'Kevin',
            'last_name' => 'Turner',
            'email' => 'kevin.turner@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 4,
            'fuel_card_id' => 4,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 234878,
            'first_name' => 'rachael',
            'last_name' => 'porter',
            'email' => 'rachael.porter@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 5,
            'fuel_card_id' => 5,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 134878,
            'first_name' => 'Alyd',
            'last_name' => 'McLaughlin',
            'email' => 'alyd.mclaughlin@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 6,
            'fuel_card_id' => 6,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 298578,
            'first_name' => 'Athan',
            'last_name' => 'Biamis',
            'email' => 'athan.biamis@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 7,
            'fuel_card_id' => 7,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 498678,
            'first_name' => 'Nicole',
            'last_name' => 'Kerr',
            'email' => 'nicole.kerr@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 8,
            'fuel_card_id' => 8,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 498109,
            'first_name' => 'Bill',
            'last_name' => 'Gates',
            'email' => 'bill.gates@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 9,
            'fuel_card_id' => 9,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('user')->insert([
            'channel_id' => 654233,
            'first_name' => 'Paddy',
            'last_name' => 'Wack',
            'email' => 'paddy.wack@noreply.com',
            'password' => bcrypt('password'),
            'max_fuel_limit' => 20.00,
            'max_distance_limit' => 20.00,
            'reward_card_id' => 10,
            'fuel_card_id' => 10,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
