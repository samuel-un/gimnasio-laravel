<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserManagementController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landing');
})->name('home');

Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');
Route::post('/user-creator', [UserController::class, 'store'])->name('user-creator.store');


Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/user-access');
})->name('logout')->middleware('auth');

Route::get('/price-view', [SubscriptionController::class, 'index'])->name('price-view');
Route::post('/price-view', [SubscriptionController::class, 'store'])->name('price-view.store');

Route::middleware('auth')->group(function () {
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
    Route::put('/user-management', [UserManagementController::class, 'update'])->name('user-management.update');

    Route::post('/inscripciones', [UserManagementController::class, 'store'])->name('inscripciones.store');

    Route::post('/reservas', [UserManagementController::class, 'storeReservation'])->name('reservas.store');
});
