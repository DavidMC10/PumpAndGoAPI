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
use Brick\Math\BigDecimal;
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
        $fuelTypeId = rand(1, 4);

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

        // Assign values to variables.
        $fuelAmount = request('fuel_amount');
        $pricePerLitre = BigDecimal::of($fuelPrice[0]->price_per_litre);
        $numberOfLitres = BigDecimal::of($fuelAmount)->multipliedBy($pricePerLitre, 2);
        // $numberOfLitres = BigDecimal::of($fuelAmount / $pricePerLitre);

        // Retrieve details of the user's default payment method.
        if (substr($user->default_payment_method, 0, 1) == 'p') {
            // Set the Stripe secret key.
            \Stripe\Stripe::setApiKey('sk_test_CU3eeCs7YXG2P7APSGq88AyI00PWnBl9zM');

            // Retrieve the default payment method.
            $defaultPaymentMethod = \Stripe\PaymentMethod::retrieve(
                $user->default_payment_method
            );

            // Set the default payment method details.
            $paymentMethod = ucfirst($defaultPaymentMethod->card->brand) . " ending in " . $defaultPaymentMethod->card->last4;
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
        $transactions = Transaction::where('user_id', $id)->orderBy('transaction_id', 'DESC')->get();

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

                // Assign values to variables.
                $pricePerLitre = $fuelPrice[0]->price_per_litre;
                $fuelDiscountPercentage = $rewards->fuel_discount_percentage;
                $numberOfLitres = $transactions[$i]->number_of_litres;

                // If the user is entitled to a discount apply it.
                if ($transactions[$i]->fuel_discount_entitlement == true) {
                    // Calculate fuel price total.
                    $totalPrice = ($pricePerLitre * $numberOfLitres) - (($pricePerLitre * $numberOfLitres) * ($fuelDiscountPercentage / 100));
                } else {
                    // Calculate fuel price total.
                    $totalPrice = BigDecimal::of($pricePerLitre)->multipliedBy($numberOfLitres, 2);
                }

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

        // Assign values to variables.
        $pricePerLitre = $fuelPrice[0]->price_per_litre;
        $fuelDiscountPercentage = $rewards->fuel_discount_percentage;
        $numberOfLitres = $transaction->number_of_litres;
        $vatRate = $vat->vat_rate;

        // If the user is entitled to a discount apply it.
        if ($transaction->fuel_discount_entitlement == true) {
            // Set discount percentage to the db value.
            $discountRate = $rewards->fuel_discount_percentage;

            // Calculate fuel price total.
            $totalPrice = ($pricePerLitre * $numberOfLitres) - (($pricePerLitre * $numberOfLitres) * ($fuelDiscountPercentage / 100));

            // Calculate fuel price total including discount without Vat.
            $priceExVat = $totalPrice - (($totalPrice / 100) * $vatRate);

            // Calculate total Vat.
            $vatTotal = ($totalPrice / 100) * $vat->vat_rate;
        } else {
            // Set discount percentage to 0.
            $discountRate = 0;

            // Calculate fuel price total.
            $totalPrice = $pricePerLitre * $numberOfLitres;

            // Calculate fuel price total excluding Vat.
            $priceExVat = $totalPrice - (($totalPrice / 100) * $vatRate);

            // Calculate total Vat.
            $vatTotal = ($totalPrice / 100) * $vat->vat_rate;
        }

        // Add data to the receipt object.
        $receipt = (object) [
            'fuel_station_name' => $fuelStation->name,
            'fuel_station_address_1' => $fuelStation->address1,
            'fuel_station_address_2' => $fuelStation->address2,
            'fuel_station_address_city_town' => $fuelStation->city_town,
            'transaction_date' => Carbon::parse($transaction->transaction_date_time)->format('d/m/Y H:i'),
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'payment_method' => $transaction->payment_method,
            'pump_number' => strval($transaction->pump_number),
            'fuel_type' => $fuelType->fuel_type_name,
            'number_of_litres' => number_format($transaction->number_of_litres, 2, '.', ''),
            'price_per_litre' => number_format($fuelPrice[0]->price_per_litre, 2, '.', ''),
            'discount' => strval($discountRate),
            'vat_rate' => strval($vat->vat_rate),
            'price_excluding_vat' => number_format($priceExVat, 2, '.', ''),
            'vat' => number_format($vatTotal, 2, '.', ''),
            'total_price' => number_format($totalPrice, 2, '.', '')
        ];

        // Return the receipt.
        return response()->json($receipt);
    }
}
