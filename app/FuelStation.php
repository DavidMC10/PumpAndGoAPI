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
}
