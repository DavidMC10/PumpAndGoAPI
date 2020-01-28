<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelTypes extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fuelTypeName'
    ];
}
