<?php

use Illuminate\Support\Facades\Route;

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


});

require __DIR__.'/auth.php';
