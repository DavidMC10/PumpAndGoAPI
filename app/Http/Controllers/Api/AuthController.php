<?php

namespace App\Http\Controllers\Api;

use App\FuelCard;
use App\Http\Controllers\Api\IssueTokenTrait;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\PasswordReset;
use App\Reward;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Passport\Client;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\ResetsPasswords;

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
            'barcode_number' => $this->generateBarcodeNumber(),
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
            'first_name' => ucfirst(request('first_name')),
            'last_name' => ucfirst(request('last_name')),
            'email' => strtolower(request('email')),
            'password' => bcrypt(request('password')),
            'max_fuel_limit' => 20,
            'max_distance_limit' => 20,
            'reward_card_id' => $reward['reward_card_id'],
            'fuel_card_id' => $fuelCard['fuel_card_id']
        ]);

        // Send the user welcome email.
        Mail::to(request('email'))->send(new WelcomeMail($user));

        // Create the access and refresh token.
        return $this->issueToken($request, 'password');
    }

    /**
     * Generate Barcode Number.
     *
     * @return integer
     */
    public function generateBarcodeNumber()
    {
        // Generate random number.
        $number = mt_rand(100000, 999999);

        // Calls the same function if the barcode exists already.
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // Valid number return.
        return $number;
    }

    /**
     * Check if barcode number exists.
     *
     * @return boolean
     */
    public function barcodeNumberExists($number)
    {
        // Query the database and return a boolean
        return Reward::where('barcode_number', $number)->exists();
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
            return response()->json([], Response::HTTP_OK);
        } else {
            return response()->json([], Response::HTTP_INTERNAL_SERVER_ERROR);
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

    /**
     * Create token password reset
     *
     * @param  [string] email
     * @return [string] message
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);
        $user = User::where('email', request('email'))->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], Response::HTTP_NOT_FOUND);
        $passwordReset = PasswordReset::updateOrCreate(
            ['email' => $user->email],
            [
                'email' => $user->email,
                'token' => str_random(60)
            ]
        );
        if ($user && $passwordReset) {
            $link = url(config('base_url') . 'password/reset/' . $passwordReset->token. '?email=' . $user->email);
            $user->notify(
                new PasswordResetRequest($link)
            );
        }
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        $passwordReset = PasswordReset::where('token', $token)->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        }
        // return view('auth.passwords.confirm');
        return response()->json($passwordReset);
    }

    /**
     * Reset password
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @param  [string] token
     * @return [string] message
     * @return [json] user object
     */
    public function reset(Request $request)
    {
        dd($request);
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'token' => 'required|string'
        ]);
        $passwordReset = PasswordReset::where([
            ['token', $request->token],
            ['email', $request->email]
        ])->first();
        if (!$passwordReset)
            return response()->json([
                'message' => 'This password reset token is invalid.'
            ], 404);
        $user = User::where('email', $passwordReset->email)->first();
        if (!$user)
            return response()->json([
                'message' => "We can't find a user with that e-mail address."
            ], 404);
        $user->password = bcrypt($request->password);
        $user->save();
        $passwordReset->delete();
        $user->notify(new PasswordResetSuccess($passwordReset));
        return response()->json($user);
    }
}
