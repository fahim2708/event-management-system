<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'create']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', HomeController::class)->name('home');
    Route::post('/logout', LogoutController::class)->name('logout');


    //Manage Events
    Route::get('/events', [EventController::class, 'index'])->name('event');
    Route::get('/add-event', [EventController::class, 'create'])->name('event.create');
    Route::post('/store-event', [EventController::class, 'store'])->name('event.store');
    Route::delete('/delete-event/{id}', [EventController::class, 'destroy'])->name('event.delete');
    Route::get('edit-event/{id}',  [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{id}',  [EventController::class, 'update']);
    Route::get('/event/{id}',  [EventController::class, 'show'])->name('event.show');
});