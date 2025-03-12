<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubscriptionController; // Usamos SubscriptionController en lugar de PriceController
use App\Http\Controllers\UserManagementController;


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


Route::middleware('auth')->group(function () {
    Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
    Route::put('/user-management', [UserManagementController::class, 'update'])->name('user-management.update');
});

Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index')->middleware('auth');
Route::put('/user-management', [UserManagementController::class, 'update'])->name('user-management.update')->middleware('auth');


Route::post('/inscripciones', [UserManagementController::class, 'store'])->name('inscripciones.store')->middleware('auth');


Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
Route::put('/user-management/update', [UserManagementController::class, 'update'])->name('user-management.update');
Route::post('/inscripciones', [UserManagementController::class, 'store'])->name('inscripciones.store');
Route::post('/reservas', [UserManagementController::class, 'storeReservation'])->name('reservas.store');
