<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // $intent = \Stripe\PaymentIntent::create([
        //     'amount' => 1099,
        //     'currency' => 'usd',
        // ]);
        // $client_secret = $intent->client_secret;

        // $token = request('token_id');
        // $charge = \Stripe\Charge::create([
        // 'amount' => 999,
        // 'currency' => 'gbp',
        // 'description' => 'Example charge',
        // 'source' => $token,
        // ]);
       $customer = \Stripe\Customer::create([
            'description' => 'My First Test Customer (created for API docs)',
            'email' => 'testcustomer3@noreply.com'
          ]);

          $key = \Stripe\EphemeralKey::create(
            ['customer' => '{{$customer->id}}'],
            ['stripe_version' => '{{2019-12-03}}']
          );

        return response()->json($key);
    }
}
