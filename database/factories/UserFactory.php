<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => "testingthis@noreply.com",
        'password' => bcrypt('password'),
        'max_fuel_limit' => 20,
        'max_distance_limit' => 20,
        'reward_card_id' => 1,
        'fuel_card_id' => 1,
    ];
});
