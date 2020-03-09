<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reward;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RewardController extends Controller
{

    /**
     * Count number of visits required until fuel discount.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserRewards()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Get user transactions.
        $transactions = User::find($id)->transaction;

        // Get user rewards.
        $rewards = User::find($id)->reward;

        // Add data to the receipt object.
        $rewardValues = (object) [
            'barcode_number' => strval($rewards->barcode_number),
            'car_wash_discount_percentage' => round($rewards->car_wash_discount_percentage),
            'fuel_discount_percentage' => round($rewards->fuel_discount_percentage),
            'deli_discount_percentage' => round($rewards->deli_discount_percentage),
            'coffee_discount_percentage' => round($rewards->coffee_discount_percentage)
        ];

        // Return the user's first name and visit count.
        return response()->json($rewardValues);
    }

    /**
     * Count number of visits required until fuel discount.
     *
     * @return \Illuminate\Http\Response
     */
    public function countNumberOfVisitsUntilFuelDiscount()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Obtain the user's first name.
        $user = User::find($id);
        $firstName = $user->first_name;

        // Count the number of transactions for the user.
        $userTransactionCount = Transaction::where('user_id', $id)->count();

        // If a multiple of 10 then return 0 to indicate there's a fuel discount.
        // Else return the number until of visits until a discount is applied.
        $visits = 0;
        if ($userTransactionCount == 0) {
            $visits = 10;
        } elseif (($userTransactionCount % 10) == 0) {
            $visits = 0;
        } else {
            $visits = 10 - ($userTransactionCount % 10);
        }

        // Return the user's first name and visit count.
        return response()->json(['first_name' => $firstName, 'visit_count' => $visits]);
    }
}
