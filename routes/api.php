<?php

use App\Http\Controllers\Api\FourSquareWebhookController;
use App\Http\Controllers\Api\OpenWeatherWebhookController;
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

Route::get('cities', function () {
    return response()->json(\App\Models\City::all(), 200);
});
Route::get('weather/{city}', [OpenWeatherWebhookController::class, 'getWeather'])->name('api.weather');
Route::get('venues', [FourSquareWebhookController::class, 'getVenues']);
