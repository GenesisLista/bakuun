<?php

use App\Http\Controllers\Api\BookingChannelController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CountTypeController;
use App\Http\Controllers\Api\InventoryTypeCodeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Booking Channel
Route::apiResource('booking-channel', BookingChannelController::class);

// Company
Route::apiResource('company', CompanyController::class);

// Count Type
Route::apiResource('count-type', CountTypeController::class);

// Inventory Type Code
Route::apiResource('inventory-type-code', InventoryTypeCodeController::class);
