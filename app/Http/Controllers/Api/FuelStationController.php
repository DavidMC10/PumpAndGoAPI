<?php

namespace App\Http\Controllers\Api;

use App\FuelStations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuelStationController extends Controller
{
    //

    public function getNearbyFuelStations(Request $request)
    {
        $lat = request('latitude');
        $lng = request('longitude');
        $distance = 3;

        $articles = FuelStations::scopeGetByDistance($lat, $lng, $distance);

        return $articles;
    }
}
