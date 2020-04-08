<?php

namespace App\Http\Controllers\Api;

use App\FuelStation;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by David McElhinney on 14/03/2020.
 */
class FuelStationController extends Controller
{

    /**
     * Get a list of nearby fuel stations.
     *
     * @param  [double] latitude
     * @param  [double] longitude
     * @param  [int] max_distance_limit
     *
     * @return mixed
     */
    public function generateListOfNearbyFuelStations(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required',
            'max_distance_limit' => 'required',
        ]);

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
            ROUND( ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ), 2 ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->with(['businessHours' => function ($query) use ($weekday) {
                $query->where('day', $weekday);
            }])->get();

        // If empty return not found.
        if (sizeof($fuelStations) <= 0) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // Return the data.
        return response()->json(['data' => $fuelStations]);
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
        // Validation.
        $this->validate($request, [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Obtain the user's channel_id
        $user = User::find($id);
        $channelId = $user->channel_id;

        // Request variables.
        $lat = request('latitude');
        $lng = request('longitude');

        // 40 Metres.
        $maxDistanceLimit = 0.025;

        // Query to obtain the nearest fuelstation.
        $fuelStation = FuelStation::select(DB::raw('fuel_station_id, name, number_of_pumps, ( 6371 * acos( cos( radians(' . $lat . ') ) * cos( radians( latitude ) ) * cos(
            radians( longitude ) - radians(' . $lng . ') ) + sin( radians(' . $lat . ') ) * sin( radians( latitude ) ) ) ) AS distance'))
            ->having('distance', '<', $maxDistanceLimit)
            ->orderBy('distance')
            ->first();

        // If empty return not found.
        if (empty($fuelStation)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // Add channel_id to the object.
        $fuelStation->channel_id = $channelId;

        // Removes the distance column.
        $fuelStation->makeHidden(['distance']);

        // Return the data.
        return $fuelStation;
    }
}
