<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FuelCard;
use App\Reward;
use App\User;
use Faker\Generator as Faker;


$reward = $factory->define(Reward::class, function (Faker $faker) {
    return [
        'barcode_number' => 1124334,
        'car_wash_discount_percentage' => 10.0,
        'fuel_discount_percentage' => 15.0,
        'deli_discount_percentage' => 10.0,
        'coffee_discount_percentage' => 10.0
    ];
});

$fuelCard = $factory->define(FuelCard::class, function (Faker $faker) {
    return [
        'fuel_card_no' => null,
        'expiry_month' => null,
        'expiry_year' => null
    ];
});


$factory->define(User::class, function ($faker) use ($factory) {
    return [
        'stripe_customer_id' => 'cus_GzKMh6L0S9o1WZ',
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => "davestests@noreply.com",
        'password' => bcrypt('password'),
        'max_fuel_limit' => 20,
        'max_distance_limit' => 20,
        'fuel_card_id' => factory(FuelCard::class)->create()->fuel_card_id,
        'reward_card_id' => factory(Reward::class)->create()->reward_card_id,
    ];
});
