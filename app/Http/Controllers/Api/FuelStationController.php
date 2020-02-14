<?php

namespace App\Http\Controllers\Api;

use App\FuelStation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuelStationController extends Controller
{

    /**
     * Get a list of nearby fuel stations.
     *
     * @param  [double] latitude
     * @param  [double] longitude
     * @param  [int] maxDistanceLimit
     *
     * @return mixed
     */
    public function generateListOfNearbyFuelStations(Request $request)
    {
        // Request variables.
        $lat = request('latitude');
        $lng = request('longitude');
        $maxDistanceLimit = request('max_distance_limit');

        // Query to obtain nearby fuel stations.
        $fuelStations = FuelStation::select(DB::raw('fuel_station_id, name, address1, address2, city_town, telephone_no, number_of_pumps, longitude, latitude,
            ROUND( ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ), 2 ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->with('businessHours:fuel_station_id,business_hours_id,day,open_time,close_time')
            ->get();


        // If no nearby fuel stations return false.
        if (empty($fuelStations)) {
            return response()->json([
                'success' => false,
                'message' => 'There are currently no fuel stations nearby.'
            ]);
        }
        return $fuelStations;
    }

    /**
     * Get current fuel station.
     *
     * @param  [double] latitude
     * @param  [double] longitude
     *
     * @return mixed
     */
    public function getCurrentFuelStation(Request $request)
    {
        // Request variables.
        $lat = request('latitude');
        $lng = request('longitude');

        // 40 Metres.
        $maxDistanceLimit = 0.025;

        // Query to obtain the nearest fuelstation.
        $fuelStations = FuelStation::select(DB::raw('fuel_station_id, number_of_pumps ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->first();

        if (!empty($fuelStations)) {
            // Removes the distance column.
            $fuelStations->makeHidden(['distance']);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You are not at a fuel station.'
            ]);
        }
        return $fuelStations;
    }
}