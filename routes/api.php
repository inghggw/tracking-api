<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingUrlController;
use App\Http\Controllers\TrackingPixelController;

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

Route::apiResources([
    'trackingPixel' => TrackingPixelController::class,
    'trackingUrl' => TrackingUrlController::class,
]);
