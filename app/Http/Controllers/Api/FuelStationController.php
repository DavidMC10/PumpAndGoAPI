<?php

namespace App\Http\Controllers\Api;

use App\FuelStation;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

        // List of all days of the week.
        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        // Gets current day of the week.
        $dayOfTheWeek = Carbon::now()->dayOfWeek;
        $weekday = $weekMap[$dayOfTheWeek];

        // Query to obtain nearby fuel stations.
        $fuelStations = FuelStation::select(DB::raw('fuel_station_id, name, address1, address2, city_town, longitude, latitude,
            ROUND( ( 3959 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ), 2 ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->with(['businessHours' => function ($query) use ($weekday) {
                $query->where('day', $weekday);
            }])->get();

        // If empty return not found.
        if (empty($fuelStations)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // Return the data.
        return response()->json(['data' => $fuelStations], Response::HTTP_OK, [], JSON_FORCE_OBJECT);
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
