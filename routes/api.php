<?php

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

Route::post('login', 'Api\AuthController@login');
Route::post('register', 'Api\AuthController@register');
Route::post('refresh', 'Api\AuthController@refresh');

Route::middleware('auth:api')->group(function () {
    Route::post('logout', 'Api\AuthController@logout');
    Route::post('updatename', 'Api\ProfileController@updateFullName');
    Route::post('updateemail', 'Api\ProfileController@updateEmail');
    Route::post('updatepassword', 'Api\ProfileController@updatePassword');
    Route::post('updatefuellimit', 'Api\ProfileController@updateMaxFuelLimit');
    Route::post('updatedistancelimit', 'Api\ProfileController@updateMaxDistanceLimit');
    Route::post('details', 'Api\AuthController@details');
    Route::post('getnearbystations', 'Api\FuelStationController@generateListOfNearbyFuelStations');
    Route::post('getcurrentstation', 'Api\FuelStationController@getCurrentFuelStation');
    Route::post('visitcount', 'Api\RewardController@countNumberOfVisitsUntilFuelDiscount');
    Route::post('transactionhistory', 'Api\TransactionController@generateTransactionHistory');
    Route::post('testing', 'Api\TransactionController@transactionTest');
    Route::post('getuserprofiledetails', 'Api\ProfileController@getUserProfileDetails');

    // Payment Controller Methods.
    Route::post('addstripecard', 'Api\PaymentController@addStripePaymentMethod');
    Route::post('deletestripecard', 'Api\PaymentController@deleteStripePaymentMethod');
    Route::post('addfuelcard', 'Api\PaymentController@addFuelCard');
    Route::post('deletefuelcard', 'Api\PaymentController@deleteFuelCard');
    Route::post('getdefaultpaymentmethod', 'Api\PaymentController@getDefaultPaymentMethod');
    Route::post('setdefaultpaymentmethod', 'Api\PaymentController@setDefaultPaymentMethod');
    Route::post('retrievepaymentmethods', 'Api\PaymentController@retrievePaymentMethods');
});
