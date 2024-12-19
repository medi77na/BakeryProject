<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta principal del dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('user/dashboard', [ProductController::class, 'userDashboard'])->name('user.dashboard');
});

// Rutas protegidas por middleware de autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('orders', OrderController::class);
    Route::resource('products', ProductController::class);
    Route::patch('/products/{id}/toggle-published', [ProductController::class, 'togglePublished']);
});

// Rutas de autenticación generadas automáticamente
require __DIR__ . '/auth.php';
