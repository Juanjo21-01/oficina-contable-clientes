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

    // Tipo de Clientes
    Route::view('tipo-clientes', 'tipo-clientes.index')->name('tipo-clientes.index');
    Route::view('tipo-clientes/{id}', 'tipo-clientes.mostrar')->name('tipo-clientes.mostrar');

    // Clientes
    Route::view('clientes', 'clientes.index')->name('clientes.index');
    Route::view('clientes/crear', 'clientes.crear')->name('clientes.crear');
    Route::view('clientes/{id}', 'clientes.mostrar')->name('clientes.mostrar');
});

require __DIR__.'/auth.php';
