<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelStations extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address1', 'address2', 'city/town', 'longitude', 'latitude', 'telephoneNo', 'numberOfPumps', 'vatId'
    ];
}
