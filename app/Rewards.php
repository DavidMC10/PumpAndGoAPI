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

    /**
     * Get the users who have Rewards.
     */
    public function users()
    {
        return $this->hasMany('App\Users');
    }
}
