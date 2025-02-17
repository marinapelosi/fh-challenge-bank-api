<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/* REST Challenge Bank */
Route::get('check-balance/{accountNumber}', 'App\Http\Controllers\AccountController@showCostumerBalance')->name('check-balance');
Route::get('move-account-balance/{accountNumber}/{amountMoney}/{moveType}', 'App\Http\Controllers\AccountController@moveAccountBalance')->name('move-account-balance');