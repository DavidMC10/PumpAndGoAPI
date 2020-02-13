<?php

namespace App\Http\Controllers\Api;

use App\FuelCard;
use App\Http\Controllers\Controller;
use App\Reward;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    /**
     * Logs the user in and provides an access token.
     *
     * @param  [string] email
     * @param  [string] password
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // If credentials correct log the user in, if not return false.
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $token =  $user->createToken('PumpAndGo')->accessToken;
            return response()->json(['token' => $token], Response::HTTP_OK);
        } else {
            return response()->json(['success' => false, 'message' => "The user credentials were incorrect."], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Create a new new user and provides the access and refresh tokens.
     *
     * @param  [string] first_name
     * @param  [string] last_name
     * @param  [string] email
     * @param  [string] password
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Ensures that the request contains the required fields.
        $validator = FacadesValidator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:8|confirmed'
        ]);

        // If the validator fails then return false.
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Email already exists."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Create a reward record.
        $reward = Reward::create([
            'car_wash_discount_percentage' => 10.0,
            'fuel_discount_percentage' => 15.0,
            'deli_discount_percentage' => 10.0,
            'coffee_discount_percentage' => 10.0
        ]);

        // Create a fuel card record.
        $fuelCard = FuelCard::create([
            'fuel_card_no' => null,
            'expiry_date' => null
        ]);

        // Create a user record.
        $user = User::create([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'max_fuel_limit' => 20,
            'max_distance_limit' => 20,
            'reward_card_id' => $reward['reward_card_id'],
            'fuel_card_id' => $fuelCard['fuel_card_id']
        ]);

        // Create the access token.
        $accessToken =  $user->createToken('PumpAndGo')->accessToken;

        return response()->json(['access_token' => $accessToken], Response::HTTP_CREATED);
    }

    /**
     * Logs the user out and revokes the access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['message' =>'You have succesfully logged out.'], Response::HTTP_OK);
        } else {
            return response()->json(['message' =>'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], Response::HTTP_CREATED);
    }
}
