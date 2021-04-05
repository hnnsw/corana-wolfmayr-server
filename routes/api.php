<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VaccinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Location routes
Route::get('locations', [LocationController::class, 'index']);
Route::post('location', [LocationController::class, 'save']);
Route::put('location/{name}', [LocationController::class, 'update']);
Route::delete('location/{name}', [LocationController::class, 'delete']);

//Vaccination routes
Route::get('vaccinations', [VaccinationController::class, 'index']);
Route::post('vaccination', [VaccinationController::class, 'save']);
Route::put('vaccination/{id}', [VaccinationController::class, 'update']);
Route::delete('vaccination/{id}', [VaccinationController::class, 'delete']);

//User routes
Route::get('users', [UserController::class, 'index']);
Route::get('users/{name}', [UserController::class, 'findByName']);
Route::post('user', [UserController::class, 'save']);
Route::put('user/{name}', [UserController::class, 'update']);
Route::delete('user/{name}', [UserController::class, 'delete']);




