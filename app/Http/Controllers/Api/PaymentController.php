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
     * @param  [string] card_number
     * @param  [string] exp_month
     * @param  [string] exp_year
     * @param  [string] cvc
     *
     * @return \Illuminate\Http\Response
     */
    public function addStripePaymentMethod(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Validation.
        $this->validate($request, [
            'card_number' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvc' => 'required|min:6'
        ]);

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
     * Delete a Stripe payment method.
     *
     * @param  [string] card_id
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteStripePaymentMethod(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'card_id' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Delete card from the customer.
        \Stripe\Customer::deleteSource(
            $user->stripe_customer_id,
            request('card_id')
        );

        // Return result.
        return response()->json(Response::HTTP_OK);
    }

    /**
     * Add a fuel card.
     *
     * @param  [string] fuel_card_no
     * @param  [string] exp_month
     * @param  [string] exp_year
     *
     * @return \Illuminate\Http\Response
     */
    public function addFuelCard(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'fuel_card_no' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Add a fuel card for the user.
        $user->fuelCard->fuel_card_id = request('fuel_card_no');
        $user->fuelCard->expiry_month = request('expiry_month');
        $user->fuelCard->expiry_year = request('expiry_year');

        // Save changes.
        $user->push();

        // Return result.
        return response()->json([],200);
    }

    /**
     * Retrieve Stripe Payment Methods.
     *
     * @return \Illuminate\Http\Response
     */
    public function retrievePaymentMethods()
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
        return response()->json($paymentMethods);
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
