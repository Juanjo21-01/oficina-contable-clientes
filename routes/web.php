<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;

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

    // Tipo de Trámites
    Route::view('tipo-tramites', 'tipo-tramites.index')->name('tipo-tramites.index');
    Route::view('tipo-tramites/{id}', 'tipo-tramites.mostrar')->name('tipo-tramites.mostrar');

    // Trámites
    Route::view('tramites', 'tramites.index')->name('tramites.index');
    Route::view('tramites/crear', 'tramites.crear')->name('tramites.crear');
    Route::view('tramites/{id}', 'tramites.mostrar')->name('tramites.mostrar');

    // PDFs
    Route::get('/tramites/pdf/{id}', [PDFController::class, 'reciboPDF'])->name('tramites.pdf');
});

require __DIR__.'/auth.php';
