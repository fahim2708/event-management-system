<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\EventController;
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

//User Authentication
Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);


Route::middleware('auth:sanctum')->group ( function()   {
    Route::prefix('events')->group(function () {
        Route::get('/view', [EventController::class, 'index']);
        Route::post('/create', [EventController::class, 'store']);
        Route::get('/show/{id}', [EventController::class, 'show']);
        Route::put('/edit/{id}', [EventController::class, 'update']);
        Route::delete('/delete/{id}', [EventController::class, 'destroy']);
    });

});