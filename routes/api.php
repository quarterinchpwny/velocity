<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\VehicleModelController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\BookingStatusController;
use App\Http\Controllers\VehicleCategoryController;

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

Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/login', [AuthenticationController::class, 'login'])->name('login');


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::resources([
        'booking' => BookingController::class,
        'booking-status' => BookingStatusController::class,
        'car-model' => VehicleModelController::class,
        'manufacturer' => ManufacturerController::class,
        'user' => UserController::class,
        'vehicle' => VehicleController::class,
        'vehicle-category' => VehicleCategoryController::class,
    ]);
});
