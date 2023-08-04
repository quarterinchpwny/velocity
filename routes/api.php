<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CarModelController;
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

Route::resources([
    'booking' => BookingController::class,
    'booking-status' => BookingStatusController::class,
    'car-model' => CarModelController::class,
    'manufacturer' => ManufacturerController::class,
    'user' => UserController::class,
    'vehicle' => VehicleController::class,
    'vehicle-category' => VehicleCategoryController::class,
]);
