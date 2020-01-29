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

    private $client;

    /**
     * Finds the grant client.
     *
     * @return void
     */
    public function __construct() {
        $this->client = Client::find(1);
    }

    /**
     * Logs the user in and provides an access and refresh token.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {

        // Ensures that the request contains the required fields.
        $validator = FacadesValidator::make($request->all(), [
            'email' => 'required',
    		'password' => 'required'
        ]);

        // If the validator fails then return false.
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => "Please ensure all fields contain valid data."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        // Data required for the access and refresh token.
        $data = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
            'scope' => ""
        ];

        // Creates the access and refresh token.
        $request = Request::create('oauth/token', 'POST', $data);

        // Decodes the JSON.
        $content = json_decode(app()->handle($request)->getContent());

        // Checks if the access token exists and returns it if so. If not false is returned.
        if (array_key_exists('access_token', $content)) {
            return response()->json([
                'success' => true,
                'message' => "The request was successful.",
                'access_token' => $content->access_token,
                'refresh_token' => $content->refresh_token
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'success' => false,
                'message' => "The user credentials were incorrect."
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Create a new new user and provides the access and refresh tokens.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {

        // Ensures that the request contains the required fields.
        $validator = FacadesValidator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed'
        ]);

        // If the validator fails then return false.
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => "Please ensure all fields contain valid data."
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

        // Data required for the access and refresh token.
        $data = [
            'grant_type' => 'password',
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'username' => request('email'),
            'password' => request('password'),
            'scope' => ""
        ];

        // Creates the access and refresh token.
        $request = Request::create('oauth/token', 'POST', $data);

        // Decodes the JSON.
        $content = json_decode(app()->handle($request)->getContent());

        // Checks if the access token exists and returns it if so. If not false is returned.
        if (array_key_exists('access_token', $content)) {
            return response()->json([
                'success' => true,
                'message' => "The request was successful.",
                'access_token' => $content->access_token,
                'refresh_token' => $content->refresh_token
            ], Response::HTTP_CREATED);
        } else {
            return response()->json([
                'success' => false,
                'message' => "The user credentials were incorrect."
            ], Response::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Logs the user out and revokes the access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout() {

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
     * Refreshes the access token.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function refresh(Request $request) {

        // Ensures that the request contains the required fields.
        $validator = FacadesValidator::make($request->all(), [
            'refresh_token' => 'required'
        ]);

        // If the validator fails then return false.
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => "Please ensure all fields contain valid data."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

         // Data required for the access and refresh token.
         $data = [
            'grant_type' => 'refresh_token',
            'refresh_token' => request('refresh_token'),
            'client_id' => $this->client->id,
            'client_secret' => $this->client->secret,
            'scope' => ""
        ];

        // Refresh the access token.
        $request = Request::create('oauth/token', 'POST', $data);

        // Decodes the JSON.
        $content = json_decode(app()->handle($request)->getContent());

        // Returns the access and refresh token.
        return response()->json([
            'success' => true,
            'message' => "The request was successful.",
            'access_token' => $content->access_token,
            'refresh_token' => $content->refresh_token
        ], Response::HTTP_CREATED);
    }
}
