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
    public function addStripeCard(Request $request)
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
        return response()->json([]);
    }

    /**
     * Adds a Stripe Payment Method.
     *
     * @param  [string] card_id
     * @param  [string] exp_month
     * @param  [string] exp_year
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStripeCard(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Validation.
        $this->validate($request, [
            'card_id' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
        ]);

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Update the payment method.
        \Stripe\PaymentMethod::update(
            request('card_id'),
            ['card' => [
                'exp_month' => request('exp_month'),
                'exp_year' => request('exp_year'),
            ]]
        );

        // Return result.
        return response()->json([]);
    }

    /**
     * Delete a Stripe payment method.
     *
     * @param  [string] card_id
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteStripeCard(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'card_id' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // If deleting the default payment method then set it to null.
        if ($user->default_payment_method == request('card_id')) {
            $user->default_payment_method = null;
            // Save changes.
            $user->save();
        }

        // Set the Stripe secret key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Delete the card from the user.
        $paymentMethod = \Stripe\PaymentMethod::retrieve(
            request('card_id')
        );
        $paymentMethod->detach();

        // Return result.
        return response()->json([]);
    }

    /**
     * Add and update Fuelcard.
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
        return response()->json([]);
    }

    /**
     * Add and update Fuelcard.
     *
     * @param  [string] exp_month
     * @param  [string] exp_year
     *
     * @return \Illuminate\Http\Response
     */
    public function updateFuelCard(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'exp_month' => 'required',
            'exp_year' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Update a fuel card for the user.
        $user->fuelCard->expiry_month = request('exp_month');
        $user->fuelCard->expiry_year = request('exp_month');

        // Save changes.
        $user->push();

        // Return result.
        return response()->json([]);
    }

    /**
     * Delete Fuelcard.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteFuelCard()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // If deleting the default payment method then set it to null.
        if ($user->default_payment_method == $user->fuelCard->fuel_card_id) {
            $user->default_payment_method = null;
            // Save changes.
            $user->save();
        }

        // Delete fuel card for the user.
        $user->fuelCard->fuel_card_no = null;
        $user->fuelCard->expiry_month = null;
        $user->fuelCard->expiry_year = null;

        // Save changes.
        $user->push();

        // Return result.
        return response()->json([]);
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

        // Return result.
        return response()->json([]);
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


        // If the default payment is null then set one.
        if ($user->default_payment_method == null) {

            // Get all Stripe payment methods for the user.
            $stripePaymentMethods = \Stripe\PaymentMethod::all([
                'customer' => $user->stripe_customer_id,
                'type' => 'card',
            ]);

            // Loop through the Stripe payment methods and add the id to the array.
            $paymentMethods = [];
            foreach ($stripePaymentMethods as $paymentMethod) {
                $paymentMethods['data'][] = array(
                    'payment_method_id' => $paymentMethod->id,
                );
            }

            // Add the fuel card ID to the array.
            if ($user->fuelCard->fuel_card_no != null) {
                $paymentMethods['data'][] = array(
                    'payment_method_id' => strval($user->fuelCard->fuel_card_id),
                );
            }

            // If not empty set the default payment method as the first payment method in the array.
            if (!empty($paymentMethods)) {
                $user->default_payment_method = $paymentMethods['data'][0];
                // Save changes.
                $user->save();
            }

            // If empty return not found.
            if (empty($paymentMethods)) {
                return response()->json([], Response::HTTP_NOT_FOUND);
            }

            // Return payment method.
            return response()->json($paymentMethods);
        }
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

        // Loop through the Stripe payment methods and extract the necessary information to an array.
        $paymentMethods = [];
        foreach ($stripePaymentMethods as $paymentMethod) {
            $paymentMethods['data'][] = array(
                'card_id' => $paymentMethod->id,
                'brand' => ucfirst($paymentMethod->card->brand),
                'last4' =>  "ending in " . $paymentMethod->card->last4
            );
        }

        // If the user has a fuel card add it to the array.
        if ($user->fuelCard->fuel_card_no != null) {
            $paymentMethods['data'][] = array(
                'card_id' => strval($user->fuelCard->fuel_card_id),
                'brand' => "Fuelcard",
                'last4' =>  "ending in " . substr($user->fuelCard->fuel_card_no, -4)
            );
        }

        // If empty return not found.
        if (empty($paymentMethods)) {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // Return data.
        return response()->json($paymentMethods);
    }
}
