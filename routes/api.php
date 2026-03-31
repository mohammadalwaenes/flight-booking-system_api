<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group.
|
*/

// Authenticated user
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:api')->get('/user', function(Request $request){
    return $request->user();
});

// Authentication routes
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Users resource (only index)
Route::apiResource('users', UserController::class)
    ->only(['index'])
    ->names([
        'index' => 'users.all',
    ]);

// Flights resource
Route::apiResource('flights', FlightController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy'])
    ->names([
        'index' => 'flights.all',
        'show' => 'flights.show',
        'store' => 'flights.store',
        'update' => 'flights.update',
        'destroy' => 'flights.destroy',
    ]);

// Booking resource
Route::apiResource('booking', BookingController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy'])
    ->names([
        'index' => 'booking.all',
        'show' => 'booking.show',
        'store' => 'booking.store',
        'update' => 'booking.update',
        'destroy' => 'booking.destroy',
    ]);

// Reservations resource
Route::apiResource('reservations', ReservationController::class)
    ->only(['index', 'show', 'store', 'update', 'destroy'])
    ->names([
        'index' => 'reservation.all',
        'show' => 'reservation.show',
        'store' => 'reservation.store',
        'update' => 'reservation.update',
        'destroy' => 'reservation.destroy',
    ]);

// Fallback route for invalid API requests
Route::fallback(function () {
    return response()->json(['error' => 'Invalid Resource Request.'], 404);
})->name('api.404');