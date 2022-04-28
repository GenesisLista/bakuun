<?php

use App\Http\Controllers\RatePlanCodeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Point Of Sale
Route::get('pos', function () {
    return view('pos');
});

// Inventory
Route::get('inventory', function () {
    return view('inventory');
});

// Booking Channel
Route::get('booking-channel', function () {
    return view('booking_channel');
});

// Company
Route::get('company', function () {
    return view('company');
});

// Count Type
Route::get('count-type', function () {
    return view('count_type');
});

// Inventory Type Code
Route::get('inventory-type-code', function () {
    return view('inventory_type_code');
});

// Rate Plan
Route::resource('rate-plan-code', RatePlanCodeController::class);

// VueJS
Route::view('/{any}', 'dashboard')
    ->middleware(['auth'])
    ->where('any', '.*');
