<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Symfony\Component\HttpFoundation\Response;
use Stripe\Error\Card;

class TransactionController extends Controller
{
    /**
     * Count number of visits required until fuel discount.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateTransactionHistory()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Count the number of transactions for the user.
        $userTransactionHistory = Transaction::where('user_id', $id)->get();

        // Return the count.
        return response()->json($userTransactionHistory);
    }


    public function transactionTest(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        $validator = FacadesValidator::make($request->all(), [
            'card_no' => 'required',
            'exp_month' => 'required',
            'exp_year' => 'required',
            'cvv' => 'required',
            'amount' => 'required'
        ]);

        // If the validator fails then return false.
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => "Email already exists."
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $stripe = Stripe::make('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        $token = $stripe->tokens()->create([
            'card' => [
                'number'    => request('card_no'),
                'exp_month' => request('exp_month'),
                'exp_year'  => request('exp_year'),
                'cvc'       => request('cvv'),
            ],
        ]);

        $charge = $stripe->charges()->create([
            'card' => $token['id'],
            'currency' => 'GBP',
            'amount'   => $request->get('amount'),
            'description' => 'Add in wallet',
        ]);

        if($charge['status'] == 'succeeded') {
            /**
            * Write Here Your Database insert logic.
            */
            return response()->json("succeeded");
        }
        return response()->json("false");
    }
}
