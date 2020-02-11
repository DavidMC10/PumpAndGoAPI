<?php

namespace App\Http\Controllers\Api;

use App\FuelStations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FuelStationController extends Controller
{
    //

    public function generateListOfNearbyFuelStations(Request $request)
    {
        $lat = request('latitude');
        $lng = request('longitude');
        $maxDistanceLimit = request('maxDistanceLimit');

        $fuelStations = FuelStations::getFuelStationsByDistance($lat, $lng, $maxDistanceLimit);

        return $fuelStations;
    }
}
