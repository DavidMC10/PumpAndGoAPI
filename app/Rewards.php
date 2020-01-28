<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rewards extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rewardCardNo', 'carWashDiscountPercentage', 'fuelDiscountPercentage', 'deliDiscountPercentage', 'coffeeDiscountPercentage'
    ];
}
