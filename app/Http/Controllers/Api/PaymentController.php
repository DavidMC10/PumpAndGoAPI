<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Adds a Stripe Payment Method.
     *
     * @return \Illuminate\Http\Response
     */
    public function addStripePaymentMethod(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Create the payment method from the request.
        $card = \Stripe\PaymentMethod::create([
          'type' => 'card',
          'card' => [
            'number' => request('card_number'),
            'exp_month' => request('exp_month'),
            'exp_year' => request('exp_year'),
            'cvc' => request('cvc'),
          ],
        ]);

        // Get the card id from the card object.
        $cardId = $card->id;

        // Retrieve the payment method from the card id.
        $paymentMethod = \Stripe\PaymentMethod::retrieve(
            $cardId
        );

        // Attach the payment method to the customer.
        $paymentMethod->attach([
            'customer' => $user->stripe_customer_id,
        ]);

        // Return result.
        return response()->json(Response::HTTP_OK);
    }

    /**
     * Retrieve Stripe Payment Methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function retrievePaymentMethods(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Create the payment method from the request.
        $paymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $user->stripe_customer_id,
            'type' => 'card',
          ]);


          $myArray = [];
          foreach ($paymentMethods as $paymentMethod) {

            array_push($myArray, $paymentMethod->card->brand);
          }

          // $paymentMethods->data[0]->card->last4

        // Return data.
        return response()->json($myArray);
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
