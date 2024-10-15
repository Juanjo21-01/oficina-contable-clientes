<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Roles;

const AUTH = 'auth';

// RUTA PRINCIPAL
Route::view('/otra', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// RUTAS PROTEGIDAS
Route::middleware(AUTH)->group(function () {
    // Roles
    Route::view('roles', 'roles')->name('roles');

    // Usuarios
    Route::view('usuarios', 'usuarios.index')->name('usuarios.index');
    Route::view('usuarios/{id}', 'usuarios.mostrar')->name('usuarios.mostrar');
});

require __DIR__.'/auth.php';
