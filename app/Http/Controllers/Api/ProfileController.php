<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class ProfileController extends Controller
{
    /**
     * Updates the user's first and last name.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateUserFullName(Request $request) {

        // Update statement.
        DB::table('users')
        ->where('userId', request('userId'))
        ->update(['firstName' => request('firstName'),
        'lastName' => request('lastName')]);

        // Return true upon success.
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Updates the user's password.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request) {

        // Update statement.
        DB::table('users')
        ->where('userId', request('userId'))
        ->update(['password' => bcrypt(request('maxDistanceLimit'))]);

        // Return true upon success.
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Updates the user's max fuel limit.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateMaxFuelLimit(Request $request) {

        // Update statement.
        DB::table('users')
        ->where('userId', request('userId'))
        ->update(['maxFuelLimit' => request('maxFuelLimit')]);

        // Return true upon success.
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }

    /**
     * Updates the user's max distance limit.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateMaxDistanceLimit(Request $request) {

        // Update statement.
        DB::table('users')
        ->where('userId', request('userId'))
        ->update(['maxDistanceLimit' => request('maxDistanceLimit')]);

        // Return true upon success.
        return response()->json(['success' => true], Response::HTTP_CREATED);
    }
}
