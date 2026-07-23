<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BackgroundImageController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PreviousDrawController;
use App\Http\Controllers\SiteTextController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.attempt');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/configuracion', [ConfiguracionController::class, 'edit'])->name('configuracion.edit');
    Route::put('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');

    Route::get('/configuracion/historial', [PreviousDrawController::class, 'index'])->name('configuracion.historial.index');
    Route::post('/configuracion/historial', [PreviousDrawController::class, 'store'])->name('configuracion.historial.store');
    Route::delete('/configuracion/historial/{previousDraw}', [PreviousDrawController::class, 'destroy'])->name('configuracion.historial.destroy');

    Route::get('/configuracion/imagenes', [BackgroundImageController::class, 'edit'])->name('configuracion.imagenes.edit');
    Route::post('/configuracion/imagenes/{slot}', [BackgroundImageController::class, 'update'])->name('configuracion.imagenes.update');

    Route::get('/configuracion/textos', [SiteTextController::class, 'edit'])->name('configuracion.textos.edit');
    Route::put('/configuracion/textos/{slot}', [SiteTextController::class, 'update'])->name('configuracion.textos.update');
});
