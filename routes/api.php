<?php

use App\Http\Controllers\Api\v1\CitiesController;
use App\Http\Controllers\Api\v1\WeatherInfoController;
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
Route::group(['middleware' => 'api','prefix' => 'v1', 'namespace' => 'Api\v1'], function () {
    Route::get('/weather-reports', [WeatherInfoController::class, 'getWeatherReports'])->name('weather.reports');
    Route::get('/statistics', [WeatherInfoController::class, 'getStatistics'])->name('weather.statistics');
    Route::get('/cities', [CitiesController::class, 'getCities'])->name('cities');
});
