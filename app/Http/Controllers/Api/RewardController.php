<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Reward;
use App\Transaction;
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

        // Count the number of transactions for the user.
        $userTransactionCount = Transaction::where('user_id', $id)->count();

        $userTransactionCount = $userTransactionCount % 10;

        // // If a multiple of 10 then return 0 to indicate there's a fuel discount.
        // // Else return the number until of visits until a discount is applied.
        // if (($userTransactionCount % 10) == 0) {
        //     $userTransactionCount = 0;
        // } else {
        //     $userTransactionCount = $userTransactionCount % 10;
        // }

        // Return the count.
        return response()->json(['count' => $userTransactionCount]);
    }
}
