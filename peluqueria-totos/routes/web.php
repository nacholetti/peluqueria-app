<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TurnoController;
use App\Http\Controllers\PeluqueroController;

// Ruta principal, podés cambiar la vista si querés
Route::get('/', function () {
    return view('welcome');
});

// Rutas RESTful para clientes, servicios, turnos y peluqueros
Route::resource('clientes', ClienteController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('turnos', TurnoController::class);
Route::resource('peluqueros', PeluqueroController::class);

// Ruta para crear turno eligiendo peluquero (pasar id de peluquero)
Route::get('turnos/create/{peluquero}', [TurnoController::class, 'createConPeluquero'])->name('turnos.createConPeluquero');
// Ruta para guardar turno
Route::post('/turnos', [TurnoController::class, 'store'])->name('turnos.store');