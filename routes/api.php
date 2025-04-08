<?php

// Importacion para los metodos de Postman
use Illuminate\Support\Facades\Route;

// Importaciones Controladores
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\CiudadController;

// Métodos para el usuario
// POST
Route::post('/registro', [UsuarioController::class, 'registrarUsuario']);

// GET
Route::get('/usuarios', [UsuarioController::class, 'obtenerUsuarios']);

// Metodos para el genero del usuario
// GET
Route::get('/api/generos', [GeneroController::class, 'obtenerGeneros']);

// Metodos para las ciudades del usuario
// GET
Route::get('/api/ciudades', [CiudadController::class, 'obtenerCiudades']);

