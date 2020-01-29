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
        'carWashDiscountPercentage', 'fuelDiscountPercentage', 'deliDiscountPercentage', 'coffeeDiscountPercentage'
    ];
}
