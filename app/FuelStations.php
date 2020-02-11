<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function scopeGetByDistance($lat, $lng, $distance)
    {
        $results = DB::select(DB::raw('SELECT name, (3959 * acos( cos( radians(' . $lat . ') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians(latitude) ) ) ) AS distance FROM fuel_stations HAVING distance < ' . $distance . ' ORDER BY distance'));

        if (!empty($results)) {

            $ids = [];

            //Extract the id's
            foreach ($results as $q) {
                array_push($ids, $q->name);
            }

            return $results;
        }

        return $results;
    }
}
