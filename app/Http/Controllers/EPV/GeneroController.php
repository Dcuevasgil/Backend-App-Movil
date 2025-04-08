<?php

namespace App\Http\Controllers;

use App\Models\Genero;
// use Illuminate\Http\Request;

class GeneroController extends Controller
{
    // public function crearGenero(Request $request)
    // {
    //     $datos_genero = $request->validate([
    //         'genero' => 'required|string|max:45',
    //     ]);

    //     $genero = Genero::create($datos_genero);

    //     return response()->json($genero, 201);
    // }

    public function obtenerGeneros()
    {
        $usuarios = Genero::all();
        return response()->json($usuarios);
    }
}
