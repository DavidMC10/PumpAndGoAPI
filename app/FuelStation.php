<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FuelStation extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'fuel_station';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'fuel_station_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address1', 'address2', 'city_town', 'longitude', 'latitude', 'telephone_no', 'number_of_pumps', 'vat_id'
    ];

    /**
     * Get the business hours for each fuel station.
     */
    public function businessHours()
    {
        return $this->hasMany('App\BusinessHours', 'fuel_station_id');
    }

    /**
     * Get the fuel prices that have fuel stations.
     */
    public function fuelPrice()
    {
        return $this->hasMany('App\FuelPrice', 'fuel_station_id');
    }

    /**
     * Get the fuel stations who have transactions.
     */
    public function transaction()
    {
        return $this->hasMany('App\Transaction', 'fuel_station_id');
    }

    /**
     * Get fuel stations that own the vat.
     */
    public function vat()
    {
        return $this->belongsTo('App\Vat', 'vat_id');
    }
}
