<?php

namespace App\Http\Controllers\Api;

use App\FuelCards;
use App\Http\Controllers\Controller;
use App\Rewards;
use App\Users;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    /**
     * Logs the user in and provides an access token.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // If credentials correct log the user in, if not return false.
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('PumpAndGO')->accessToken;
            return response()->json(['success' => $success], Response::HTTP_CREATED);
        } else {
            return response()->json(['success' => false, 'message' => "The user credentials were incorrect."], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Create a new new user and provides the access and refresh tokens.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        // Ensures that the request contains the required fields.
        $validator = FacadesValidator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
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
        $reward = Rewards::create([
            'carWashDiscountPercentage' => 10.0,
            'fuelDiscountPercentage' => 15.0,
            'deliDiscountPercentage' => 10.0,
            'coffeeDiscountPercentage' => 10.0
        ]);

        // Create a fuel card record.
        $fuelCard = FuelCards::create([
            'fuelCardNo' => null,
            'expiryDate' => null
        ]);

        // Create a user record.
        $user = Users::create([
            'firstName' => request('firstName'),
            'lastName' => request('lastName'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'maxFuelLimit' => 20,
            'maxDistanceLimit' => 20,
            'rewardCardId' => $reward['id'],
            'fuelCardId' => $fuelCard['id']
        ]);

        $accessToken =  $user->createToken('PumpAndGo')->accessToken;

        return response()->json([
            'success' => true,
            'message' => "The request was successful.",
            'access_token' => $accessToken
        ], Response::HTTP_CREATED);
    }

    /**
     * Logs the user out and revokes the access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        // Finds the user's access token.
        $accessToken = Auth::user()->token();

        // Revokes the user's access token.
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        // Returns success on completion.
        return response()->json(['success' => true], Response::HTTP_CREATED);
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
