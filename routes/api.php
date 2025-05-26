<?php

use App\Http\Controllers\ApiEPV\LocalidadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiEPV\UsuarioController;


Route::group(['middleware' => 'api'], function () {
    
    // Endpoints usuarios
    Route::get('/usuarios', [UsuarioController::class, 'obtenerUsuarios']);
    Route::post('/usuarios/registro', [UsuarioController::class, 'registrarPerfil']);
    Route::put('/usuarios/{id}', [UsuarioController::class, 'actualizarPerfil']);
    Route::delete('/usuarios/{id}', [UsuarioController::class, 'eliminarPerfil']);

    // Endpoints localidades
    Route::get('/localidades', [LocalidadController::class, 'obtenerLocalidades']);
});
