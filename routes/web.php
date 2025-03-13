<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('landing');
});

Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');

Route::post('/user-creator', [UserController::class, 'store']);

Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');

Route::get('/price-view', [SubscriptionController::class, 'index'])->name('price-view');
Route::post('/price-view', [SubscriptionController::class, 'store'])->name('price-view.store');