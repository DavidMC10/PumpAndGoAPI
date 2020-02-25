<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Adds a Stripe Payment Method.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStripePaymentMethod()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        $paymentMethod = \Stripe\PaymentMethod::create([
          'type' => 'card',
          'card' => [
            'number' => '4242424242424242',
            'exp_month' => 2,
            'exp_year' => 2021,
            'cvc' => '314',
          ],
        ]);

        // Return the count.
        return response()->json($paymentMethod);
    }

    /**
     * Adds a fuel card for the customer.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addFuelCard()
    // {
    //     // Obtain the authenticated user's id.
    //     $id = Auth::id();

    //     User::where

    //     // Count the number of transactions for the user.
    //     $userTransactionHistory = Transaction::where('user_id', $id)->get();

    //     // Return the count.
    //     return response()->json($userTransactionHistory);
    // }
}
