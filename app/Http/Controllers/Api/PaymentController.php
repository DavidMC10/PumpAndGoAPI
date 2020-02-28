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
            'cvc' => 'required'
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

        // Delete the card from the user.
        $paymentMethod = \Stripe\PaymentMethod::retrieve(
            request('card_id')
        );
        $paymentMethod->detach();

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
        $user->fuelCard->fuel_card_no = request('fuel_card_no');
        $user->fuelCard->expiry_month = request('exp_month');
        $user->fuelCard->expiry_year = request('exp_month');

        // Save changes.
        $user->push();

        // Return result.
        return response()->json([], 200);
    }

    public function deleteFuelCard()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Delete fuel card for the user.
        $user->fuelCard->fuel_card_no = null;
        $user->fuelCard->expiry_month = null;
        $user->fuelCard->expiry_year = null;

        // Save changes.
        $user->push();

        // Return result.
        return response()->json([], 200);
    }

    /**
     * Set default payment method.
     *
     * @return \Illuminate\Http\Response
     */
    public function setDefaultPaymentMethod(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'default_payment_method' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Update the user's default payment method.
        $user->default_payment_method = request('default_payment_method');
    }

    /**
     * Get default payment method.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDefaultPaymentMethod()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        $stripePaymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $user->stripe_customer_id,
            'type' => 'card',
        ]);

        // Loop through the Stripe payment methods and extract the necessary information to an array.
        $paymentMethods = [];
        foreach ($stripePaymentMethods as $paymentMethod) {
            $paymentMethods['data'][] = array(
                'id' => $paymentMethod->id,
            );
        }

        // If the user has a fuel card add it to the array.
        // if ($user->fuelCard->fuel_card_no != null) {
        //     $paymentMethods['data'][] = array(
        //         'id' => strval($user->fuelCard->fuel_card_id),
        //     );
        // }

        $bad = "Yes";

        if (empty($paymentMethods)) {
            $bad = "no";
        }

        // Update the user's default payment method.
        $user->default_payment_method = request('default_payment_method');

        // If the user has a fuel card add it to the array.
        if ($user->fuelCard->fuel_card_no != null) {
        }

        // Return payment method.
        return response()->json($bad);
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
        $stripePaymentMethods = \Stripe\PaymentMethod::all([
            'customer' => $user->stripe_customer_id,
            'type' => 'card',
        ]);

        if ($user->default_payment_method == null) {
            $user->default_payment_method = request('default_payment_method');
        }

        // Loop through the Stripe payment methods and extract the necessary information to an array.
        $paymentMethods = [];
        foreach ($stripePaymentMethods as $paymentMethod) {
            $paymentMethods['data'][] = array(
                'id' => $paymentMethod->id,
                'brand' => ucfirst($paymentMethod->card->brand),
                'last4' =>  "Ending in " . $paymentMethod->card->last4
            );
        }

        // If the user has a fuel card add it to the array.
        if ($user->fuelCard->fuel_card_no != null) {
            $paymentMethods['data'][] = array(
                'id' => strval($user->fuelCard->fuel_card_id),
                'brand' => "Fuelcard",
                'last4' =>  "Ending in " . substr($user->fuelCard->fuel_card_no, -4)
            );
        }

        // Return data.
        return response()->json($paymentMethods);
    }
}
