<?php

namespace App\Http\Controllers\Api;

use App\FuelCard;
use App\Http\Controllers\Api\IssueTokenTrait;
use App\Http\Controllers\Controller;
use App\Reward;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Laravel\Passport\Client;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    use IssueTokenTrait;

    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    /**
     * Logs the user in and provides an access token.
     *
     * @param  [string] email
     * @param  [string] password
     *
     * @return mixed
     */
    public function login(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        return $this->issueToken($request, 'password');
    }

    /**
     * Create a new new user and provides the access and refresh tokens.
     *
     * @param  [string] first_name
     * @param  [string] last_name
     * @param  [string] email
     * @param  [string] password
     *
     * @return mixed
     */
    public function register(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6'
        ]);

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
            'expiry_month' => null,
            'expiry_year' => null
        ]);

        // Set Stripe Api key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Create a Stripe customer.
        $customer = \Stripe\Customer::create([
            'description' => 'Pump And Go Customer',
            'email' => request('email')
          ]);

        // Create a user record.
        $user = User::create([
            'stripe_customer_id' => $customer->id,
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'max_fuel_limit' => 20,
            'max_distance_limit' => 20,
            'reward_card_id' => $reward['reward_card_id'],
            'fuel_card_id' => $fuelCard['fuel_card_id']
        ]);

        // Create the access and refresh token.
        return $this->issueToken($request, 'password');
    }

    /**
     * Refreshes the access token.
     *
     * @param  [string] refresh_token
     *
     * @return \Illuminate\Http\Response
     */
    public function refresh(Request $request)
    {
        // Validation
        $this->validate($request, [
            'refresh_token' => 'required'
        ]);

        return $this->issueToken($request, 'refresh_token');
    }

    /**
     * Logs the user out and revokes the access token.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        // If authenticated revoke the access token.
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['message' => 'You have succesfully logged out.'], Response::HTTP_OK);
        } else {
            return response()->json(['message' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
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
