<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{

    /**
     * Updates the user's first and last name.
     *
     * @param  [string] first_name
     * @param  [string] last_name
     *
     * @return \Illuminate\Http\Response
     */
    public function updateUserFullName(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the name from the request.
        $user = User::find($id);
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json(['message' => 'Name has successfully been updated.'], Response::HTTP_OK);
    }

    /**
     * Updates the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the password from the request.
        $user = User::find($id);
        $user->password = bcrypt(request('password'));

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json(['message' => 'Password has been updated.'], Response::HTTP_OK);
    }

    /**
     * Updates the user's max fuel limit.
     *
     * @param  [string] max_fuel_limit
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMaxFuelLimit(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the max fuel limit from the request.
        $user = User::find($id);
        $user->max_fuel_limit = request('max_fuel_limit');

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json(['message' => 'Max Fuel Limit has been updated.'], Response::HTTP_OK);
    }

    /**
     * Updates the user's max distance limit.
     *
     * @param  [string] max_distance_limit
     *
     * @return \Illuminate\Http\Response
     */
    public function updateMaxDistanceLimit(request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the max distance limit from the request.
        $user = User::find($id);
        $user->max_distance_limit = Request('max_distance_limit');

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json(['message' => 'Max Distance Limit has been updated.'], Response::HTTP_OK);
    }

    /**
     * Gets the user's profile details.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserProfileDetails()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Query to obtain nearby fuel stations.
        $userDetails = User::select('first_name', 'last_name', 'email', 'max_fuel_limit', 'max_distance_limit' )->where('user_id', $id)->get();

        // Return the selected details.
        return response()->json($userDetails);
    }
}
