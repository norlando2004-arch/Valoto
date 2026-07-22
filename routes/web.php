<?php

use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PreviousDrawController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/configuracion', [ConfiguracionController::class, 'edit'])->name('configuracion.edit');
Route::put('/configuracion', [ConfiguracionController::class, 'update'])->name('configuracion.update');

Route::get('/configuracion/historial', [PreviousDrawController::class, 'index'])->name('configuracion.historial.index');
Route::post('/configuracion/historial', [PreviousDrawController::class, 'store'])->name('configuracion.historial.store');
Route::delete('/configuracion/historial/{previousDraw}', [PreviousDrawController::class, 'destroy'])->name('configuracion.historial.destroy');
