<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncidenciaController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DispositivoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Incidencias
    Route::resource('incidencias', IncidenciaController::class);

    // Aulas (solo consulta)
    Route::get('/aulas', [AulaController::class, 'index'])->name('aulas.index');

    // Dispositivos (solo consulta)
    Route::get('/dispositivos', [DispositivoController::class, 'index'])->name('dispositivos.index');

    // Profesores + resolver incidencias (solo TDE)
    Route::middleware('es_tde')->group(function () {

        Route::resource('profesores', ProfesorController::class)->parameters([
            'profesores' => 'profesor'
        ]);

        Route::post('/incidencias/{incidencia}/resolver', 
            [IncidenciaController::class, 'resolver']
        )->name('incidencias.resolver');
    });
});

require __DIR__.'/auth.php';
