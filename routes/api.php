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

Route::middleware('auth:api')->get('/account', function (Request $request) {
    return $request->account();
});

Route::apiResource('banks', BankController::class)->middleware('auth:api');
Route::apiResource('accounts', AccountController::class)->middleware('auth:api');
Route::apiResource('users', UserController::class)->middleware('auth:api');
Route::apiResource('credits', CreditController::class)->middleware('auth:api');
Route::apiResource('transfers', TransferController::class)->middleware('auth:api');
Route::post('accounts/{account_id}/credits', [CreditController::class, 'store'])->middleware('auth:api');
Route::get('accounts/{account_id}/credits', [CreditController::class, 'showAll'])->middleware('auth:api');
Route::get('accounts/{account_id}/credits/{credit_id}', [CreditController::class, 'show'])->middleware('auth:api');
Route::get('accounts/{account_id}/bank', [BankController::class, 'show'])->middleware('auth:api');
Route::post('login', [UserController::class, 'login']);
Route::get('accounts/{account_id}/transfers', [TransferController::class, 'showUserTransfers'])->middleware('auth:api');
