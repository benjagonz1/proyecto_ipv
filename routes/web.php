<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InspeccionController;
use App\Http\Controllers\ProfileController;

// Página principal redirige al login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rutas protegidas por login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD Inspecciones
    Route::resource('/inspecciones', InspeccionController::class);

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// Rutas de login / registro de Breeze
require __DIR__.'/auth.php';

// 🚨 RUTA TEMPORAL PARA CREAR ADMIN (ajustada a tu modelo REAL)
Route::get('/crear-admin', function () {
    \App\Models\User::create([
        'nombrecompleto' => 'Administrador del sistema',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('Admin123+'),
        'rol_id' => 1,     // admin
        'activo' => 1,
    ]);

    return 'Usuario admin creado correctamente.';
});
