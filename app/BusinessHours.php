<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessHours extends Model
{

    /**
     * The table name.
     *
     * @var
     */
    protected $table = 'business_hours';

    /**
     * The primary key of the table.
     *
     * @var
     */
    protected $primaryKey = 'business_hours_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'day', 'open_time', 'close_time'
    ];

    /**
     * Get the fuel stations that own the business hours.
     */
    public function fuelStation()
    {
        return $this->belongsTo('App\FuelStation', 'fuel_station_id');
    }
}
