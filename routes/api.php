<?php

use App\Http\Controllers\API\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// prefix('api/location')->name('location.')
Route::controller(LocationController::class)->group(function () {
    Route::get('/cities/{id}', 'getCitiesByStateId');
    Route::get('/districts/{id}', 'getDistrictsByCityId');
    Route::get('/tehsils/{id}', 'getTehsilsByDistrictId');
    Route::get('/panchayats/{id}', 'getPanchayatsByTehsilId');
    Route::get('/wards/{id}', 'getWardsByPanchayatId');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
