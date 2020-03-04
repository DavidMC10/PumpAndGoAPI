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
    public function updateFullName(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the name from the request.
        $user = User::find($id);
        $user->first_name = ucfirst(request('first_name'));
        $user->last_name = ucfirst(request('last_name'));

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json([], Response::HTTP_OK);
    }

    /**
     * Updates the user's email address.
     *
     * @param  [string] email
     *
     * @return \Illuminate\Http\Response
     */
    public function updateEmail(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'email' => 'required|email|unique:user,email',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the name from the request.
        $user = User::find($id);
        $user->email = strtolower(request('email'));

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json([], Response::HTTP_OK);
    }


    /**
     * Updates the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'password' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the password from the request.
        $user = User::find($id);
        $user->password = bcrypt(request('password'));

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json([], Response::HTTP_OK);
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
        // Validation.
        $this->validate($request, [
            'max_fuel_limit' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the max fuel limit from the request.
        $user = User::find($id);
        $user->max_fuel_limit = request('max_fuel_limit');

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json([], Response::HTTP_OK);
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
        // Validation.
        $this->validate($request, [
            'max_distance_limit' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user and update the max distance limit from the request.
        $user = User::find($id);
        $user->max_distance_limit = Request('max_distance_limit');

        // Save the changes.
        $user->save();

        // Return true upon success.
        return response()->json([], Response::HTTP_OK);
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

        // Query to obtain the user's profile details.
        $userDetails = User::select('first_name', 'last_name', 'email', 'max_fuel_limit', 'max_distance_limit')->where('user_id', $id)->first();

        // Return the selected details.
        return $userDetails;
    }
}
