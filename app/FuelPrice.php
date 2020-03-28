<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Created by David McElhinney on 14/03/2020.
 */
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

    /**
     * Get fuel types that own the fuel price.
     */
    public function fuelType()
    {
        return $this->belongsTo('App\FuelType', 'fuel_type_id');
    }

    /**
     * Get fuel stations that own the fuel price.
     */
    public function fuelStation()
    {
        return $this->belongsTo('App\FuelStation', 'fuel_station_id');
    }
}
