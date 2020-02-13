<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuelPrice extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'fuel_price';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_date', 'end_date', 'price_per_litre'
    ];
}
