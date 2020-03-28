<?php

use App\Events\MyEvent;
use App\Mail\MailTrapExample;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Auth Controller methods.
Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');
Route::post('refresh', 'Api\AuthController@refresh');
Route::post('createpasswordresettoken', 'Api\AuthController@createPasswordResetToken');

// User must identify with access_token to access these methods.
Route::middleware('auth:api')->group(function () {

    // Auth Controller methods.
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('details', 'Api\AuthController@details');

    // Fuel Station Controller methods.
    Route::post('getnearbystations', 'Api\FuelStationController@generateListOfNearbyFuelStations');
    Route::post('getcurrentstation', 'Api\FuelStationController@getCurrentFuelStation');

    // Reward Controller methods.
    Route::post('visitcount', 'Api\RewardController@countNumberOfVisitsUntilFuelDiscount');
    Route::post('getrewards', 'Api\RewardController@getUserRewards');

    // Profile Controller methods.
    Route::post('updatename', 'Api\ProfileController@updateFullName');
    Route::post('updateemail', 'Api\ProfileController@updateEmail');
    Route::post('updatepassword', 'Api\ProfileController@updatePassword');
    Route::post('updatefuellimit', 'Api\ProfileController@updateMaxFuelLimit');
    Route::post('updatedistancelimit', 'Api\ProfileController@updateMaxDistanceLimit');
    Route::post('getuserprofiledetails', 'Api\ProfileController@getUserProfileDetails');

    // Transaction Controller methods.
    Route::post('createcharge', 'Api\TransactionController@createCharge');
    Route::post('createtransaction', 'Api\TransactionController@createTransaction');
    Route::post('getrecenttransactionid', 'Api\TransactionController@getRecentTransactionId');
    Route::post('gettransactionhistory', 'Api\TransactionController@generateTransactionHistory');
    Route::post('getreceipt', 'Api\TransactionController@generateReceipt');

    // Payment Controller methods.
    Route::post('addstripecard', 'Api\PaymentController@addStripeCard');
    Route::post('updatestripecard', 'Api\PaymentController@updateStripeCard');
    Route::post('deletestripecard', 'Api\PaymentController@deleteStripeCard');
    Route::post('addfuelcard', 'Api\PaymentController@addFuelCard');
    Route::post('updatefuelcard', 'Api\PaymentController@updateFuelCard');
    Route::post('deletefuelcard', 'Api\PaymentController@deleteFuelCard');
    Route::post('getdefaultpaymentmethod', 'Api\PaymentController@getDefaultPaymentMethod');
    Route::post('setdefaultpaymentmethod', 'Api\PaymentController@setDefaultPaymentMethod');
    Route::post('retrievepaymentmethods', 'Api\PaymentController@retrievePaymentMethods');
});
