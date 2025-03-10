<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController; // Usamos SubscriptionController en lugar de PriceController

// Ruta principal
Route::get('/', function () {
    return view('landing');
});

// Ruta para mostrar la vista de creación de usuario
Route::get('/user-creator', [UserController::class, 'create'])->name('user-creator');

// Ruta para procesar el formulario de creación de usuario
Route::post('/user-creator', [UserController::class, 'store']);

// Rutas para el login del usuario
Route::get('/user-access', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/user-access', [AuthController::class, 'login'])->name('login.post');

// Cambiar las rutas de precios y planes a /price-view
Route::get('/price-view', [SubscriptionController::class, 'index'])->name('price-view'); // Mostrar precios
Route::post('/price-view', [SubscriptionController::class, 'store'])->name('price-view.store'); // Procesar suscripción