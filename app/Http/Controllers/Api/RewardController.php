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
    public function countNumberOfVisitsUntilFuelDiscount()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Obtain the user's first name.
        $firstName = User::select('first_name')->where('user_id', $id)->get();

        // Count the number of transactions for the user.
        $userTransactionCount = Transaction::where('user_id', $id)->count();

        // // If a multiple of 10 then return 0 to indicate there's a fuel discount.
        // // Else return the number until of visits until a discount is applied.
        if (($userTransactionCount % 10) == 0) {
            $userTransactionCount = 0;
        } else {
            $userTransactionCount = 10 - ($userTransactionCount % 10);
        }

        // Return the user's first name and visit count.
        return response()->json(['first_name' => $firstName, 'visit_count' => $userTransactionCount]);
    }
}
