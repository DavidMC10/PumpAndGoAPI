<?php

namespace App\Http\Controllers\Api;

use App\Events\MyEvent;
use App\FuelCard;
use App\FuelPrice;
use App\FuelStation;
use App\FuelType;
use App\Http\Controllers\Controller;
use App\Transaction;
use App\User;
use App\Vat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{

    /**
     * Capture a charge for the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCharge(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'fuel_amount' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Set Stripe Api key.
        \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

        // Create a charge.
        $charge = \Stripe\PaymentIntent::create([
            'amount' => request('fuel_amount') * 100,
            'currency' => 'eur',
            'customer' => $user->stripe_customer_id,
            'description' => 'Fuel Charge',
            'payment_method' => $user->default_payment_method,
            'capture_method' => 'manual',
        ]);

        // Save the payment intent id.
        $user->payment_intent = $charge->id;

        // Save changes.
        $user->save();

        // Return success.
        return response()->json([]);
    }

    /**
     * Create a transaction for the user and turn on the pump.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction(Request $request)
    {
        // Validation.
        $this->validate($request, [
            'fuel_station_id' => 'required',
            'fuel_amount' => 'required',
            'pump_number' => 'required',
        ]);

        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Find the user.
        $user = User::find($id);

        // Get the price per litre for today.
        $fuelTypeId = rand(1,4);
        $fuelPrice = FuelPrice::select('price_per_litre')
        ->where('fuel_station_id', request('fuel_station_id'))
        ->where('fuel_type_id', $fuelTypeId)
        ->whereDate('start_date', '<=', Carbon::now())
        ->whereDate('end_date', '>=', Carbon::now())
        ->get();

        // Check if the user is entitled to a fuel discount.
        $userTransactionCount = Transaction::where('user_id', $id)->count();
        if ($userTransactionCount == 0) {
            $discountEntitlement = false;
        } elseif (($userTransactionCount % 10) == 0) {
            $discountEntitlement = true;
        } else {
            $discountEntitlement = false;
        }

        // Get user rewards.
        $rewards = User::find($id)->reward;
        // Get the Vat Rate on fuel.
        $vat = Vat::select('vat_rate')->first();

        $fuelAmount = round(request('fuel_amount'), 2);
        $pricePerLitre = round($fuelPrice[0]->price_per_litre, 2);
        $vatRate = round($vat->vat_rate, 2);
        $fuelAmountIncVat = round($fuelAmount - (($fuelAmount / 100) * $vatRate), 2);
        $numberOfLitres = round($fuelAmount / $pricePerLitre, 2);

        // return $fuelAmountIncVat;

        // Retrieve details of the user's default payment method.
        if (substr($user->default_payment_method, 0, 1) == 'p') {
            // Set the Stripe secret key.
            \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

            // Retrieve the default payment method.
            $defaultPaymentMethod = \Stripe\PaymentMethod::retrieve(
                $user->default_payment_method
            );

            // Set the default payment method details.
            $paymentMethod = $defaultPaymentMethod->card->brand . " ending in " . $defaultPaymentMethod->card->last4;
        } else {
            // Set the default payment method details.
            $paymentMethod = "Fuelcard ending in " . substr($user->fuelCard->fuel_card_no, -4);
        }

        // Create the user transaction record.
        Transaction::create([
            'user_id' => $id,
            'fuel_type_id' => $fuelTypeId,
            'fuel_station_id' => request('fuel_station_id'),
            'transaction_date_time' => Carbon::now(),
            'number_of_litres' => $numberOfLitres,
            'pump_number' => request('pump_number'),
            'fuel_discount_entitlement' => $discountEntitlement,
            'payment_method' => $paymentMethod,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        for ($i = 0; $i < 10; $i++) {
            event(new MyEvent('hello world' . $i));
            sleep(2);
        }
    }

    /**
     * Generate a list of user transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateTransactionHistory()
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Get user transactions.
        $transactions = User::find($id)->transaction;

        // Get user rewards.
        $rewards = User::find($id)->reward;

        // Create transaction history array.
        $transactionHistory = [];

        // If not empty calculate transaction cost, else return not found.
        if (sizeof($transactions) > 0) {
            for ($i = 0; $i < count($transactions); $i++) {

                // Get the transaction id.
                $transactionId = $transactions[$i]->transaction_id;

                // Get the fuel station name.
                $fuelStation = FuelStation::select('name')
                    ->where('fuel_station_id', $transactions[$i]->fuel_station_id)
                    ->get();
                $fuelStationName = $fuelStation[0]->name;

                // Get the price per litre for today.
                $fuelPrice = FuelPrice::select('price_per_litre')
                    ->where('fuel_station_id', $transactions[$i]->fuel_station_id)
                    ->where('fuel_type_id', $transactions[$i]->fuel_type_id)
                    ->whereDate('start_date', '<=', $transactions[$i]->transaction_date_time)
                    ->whereDate('end_date', '>=', $transactions[$i]->transaction_date_time)
                    ->get();

                // Get the Vat Rate on fuel.
                $vat = Vat::select('vat_rate')->first();

                // Round prices to two decimals.
                $pricePerLitre = round($fuelPrice[0]->price_per_litre, 2);
                $fuelDiscountPercentage = round($rewards->fuel_discount_percentage, 2);
                $numberOfLitres = round($transactions[$i]->number_of_litres, 2);
                $vatRate = round($vat->vat_rate, 2);

                // If the user is entitled to a discount apply it.
                if ($transactions[$i]->fuel_discount_entitlement == true) {
                    // Calculate fuel price without vat and including discount.
                    $priceExcVat = round($pricePerLitre * $numberOfLitres - ((($pricePerLitre * $numberOfLitres) / 100) * $fuelDiscountPercentage), 2);
                } else {
                    // Calculate fuel price without vat.
                    $priceExcVat = round($pricePerLitre * $numberOfLitres, 2);
                }

                // Calculate fuel price with vat.
                $totalPrice = strval(round($priceExcVat + (($priceExcVat / 100) * $vatRate), 2));

                // Get the date of the transaction.
                $transactionDate = Carbon::parse($transactions[$i]->transaction_date_time)->format('d/m/Y');

                // Get the number of litres.
                $numOfLitres = $transactions[$i]->number_of_litres;

                // Add values to the transaction history array.
                $transactionHistory['data'][] = array(
                    'transaction_id' => $transactionId,
                    'fuel_station_name' => $fuelStationName,
                    'total_price' => $totalPrice,
                    'transaction_date' => $transactionDate,
                    'number_of_litres' =>  $numOfLitres
                );
            }
        } else {
            return response()->json([], Response::HTTP_NOT_FOUND);
        }

        // Return the transaction history.
        return response()->json($transactionHistory);
    }

    /**
     * Generate a receipt for the user.
     *
     * @param  [int] transaction_id
     *
     * @return \Illuminate\Http\Response
     */
    public function generateReceipt(Request $request)
    {
        // Obtain the authenticated user's id.
        $id = Auth::id();

        // Validation.
        $this->validate($request, [
            'transaction_id' => 'required',
        ]);

        // Request variable.
        $transactionId = request('transaction_id');

        // Get the user transaction.
        $transaction = Transaction::find($transactionId);

        // Get the user.
        $user = User::find($id);

        // Get the fuel type.
        $fuelType = FuelType::find($transaction->fuel_type_id);

        // Get the fuel station.
        $fuelStation = FuelStation::find($transaction->fuel_station_id);

        // Get the Vat Rate on fuel.
        $vat = Vat::select('vat_rate')->first();

        // Get user rewards.
        $rewards = User::find($id)->reward;

        // Get the price per litre for today.
        $fuelPrice = FuelPrice::select('price_per_litre')
            ->where('fuel_station_id', $transaction->fuel_station_id)
            ->where('fuel_type_id', $transaction->fuel_type_id)
            ->whereDate('start_date', '<=', $transaction->transaction_date_time)
            ->whereDate('end_date', '>=', $transaction->transaction_date_time)
            ->get();

        // Round prices to two decimals.
        $pricePerLitre = round($fuelPrice[0]->price_per_litre, 2);
        $fuelDiscountPercentage = round($rewards->fuel_discount_percentage, 2);
        $numberOfLitres = round($transaction->number_of_litres, 2);
        $vatRate = round($vat->vat_rate, 2);

        // If the user is entitled to a discount apply it.
        if ($transaction->fuel_discount_entitlement == true) {
            // Set discount percentage to the db value.
            $discountRate = $rewards->fuel_discount_percentage;
            $priceExVat = 0;
            // Calculate fuel price total including discount.
            $totalPrice = round($pricePerLitre * $numberOfLitres - ((($pricePerLitre * $numberOfLitres) / 100) * $fuelDiscountPercentage), 2);
        } else {
            // Set discount percentage to 0.
            $discountRate = 0;

            // Calculate fuel price total.
            $totalPrice = round($pricePerLitre * $numberOfLitres, 2);

            $priceExVat = round($totalPrice - (($totalPrice / 100) * $vatRate), 2);
            // return $priceExcVat;
        }

        // Calculate vat.
        $vatTotal = round(($priceExVat / 100) * $vat->vat_rate, 2);

        return $totalPrice;

        // Add data to the receipt object.
        $receipt = (object) [
            'fuel_station_name' => $fuelStation->name,
            'fuel_station_address_1' => $fuelStation->address1,
            'fuel_station_address_2' => $fuelStation->address2,
            'fuel_station_address_city_town' => $fuelStation->city_town,
            'transaction_date' => Carbon::parse($transaction->transaction_date_time)->format('d/m/y h:m'),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'payment_method' => $transaction->payment_method,
            'pump_number' => strval($transaction->pump_number),
            'fuel_type' => $fuelType->fuel_type_name,
            'number_of_litres' => $transaction->number_of_litres,
            'price_per_litre' => $fuelPrice[0]->price_per_litre,
            'discount' => strval($discountRate),
            'vat_rate' => round($vat->vat_rate),
            'price_excluding_vat' => strval($priceExVat),
            'vat' => strval($vatTotal),
            'total_price' => strval($totalPrice)
        ];

        // Return the receipt.
        return response()->json($receipt);
    }
}
