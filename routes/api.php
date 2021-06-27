<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransferController;

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

Route::apiResource('banks', BankController::class);
Route::apiResource('accounts', AccountController::class);
Route::apiResource('credits', CreditController::class);
Route::post('accounts/{account_id}/credits', [CreditController::class, 'store']);
Route::get('accounts/{account_id}/credits', [CreditController::class, 'showAll']);
Route::get('accounts/{account_id}/credits/{credit_id}', [CreditController::class, 'show']);
Route::get('accounts/{account_id}/bank', [BankController::class, 'show']);
