<?php

namespace App\Http\Controllers\Api;

use App\FuelCard;
use App\Http\Controllers\Api\IssueTokenTrait;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\Reward;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
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
     * Send password reset link.
     */
    public function sendPasswordResetLink(Request $request)
    {
        return $this->sendResetLinkEmail($request);
    }

    /**
     * Get the response for a successful password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return response()->json([
            'message' => 'Password reset email sent.',
            'data' => $response
        ]);
    }

    /**
     * Get the response for a failed password reset link.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Email could not be sent to this email address.']);
    }

    /**
     * Handle reset password
     */
    public function callResetPassword(Request $request)
    {
        return $this->reset($request);
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);
        $user->save();
        event(new PasswordReset($user));
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Password reset successfully.']);
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return response()->json(['message' => 'Failed, Invalid Token.']);
    }
}
