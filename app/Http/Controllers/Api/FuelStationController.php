<?php

namespace App\Http\Controllers\Api;

use App\FuelStation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

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

        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        // Query to obtain nearby fuel stations.
        $fuelStations = FuelStation::select(DB::raw('fuel_station_id, name, address1, address2, city_town, telephone_no, number_of_pumps, longitude, latitude,
            ROUND( ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ), 2 ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->whereHas('businessHours:fuel_station_id,business_hours_id,open_time,close_time', function($q){
                $q->where('day', 'Friday');
            })->get();

        // If empty return not found.
        if (empty($fuelStations)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // return $fuelStations;
        // return response()->json(['data' => $fuelStations], 200, [], JSON_NUMERIC_CHECK);
        return response()->json($fuelStations);
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
        $fuelStations = FuelStation::select(DB::raw('fuel_station_id, number_of_pumps, ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
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
