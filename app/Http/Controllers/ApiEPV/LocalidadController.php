<?php

namespace App\Http\Controllers\ApiEPV;

use App\Http\Controllers\Controller;


use App\Models\modelosEpv\Localidad;


use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    // Obtener todas las localidades
    public function obtenerLocalidades()
    {
        $localidades = Localidad::all(); // Obtener todas las localidades
        return response()->json($localidades);
    }
}

