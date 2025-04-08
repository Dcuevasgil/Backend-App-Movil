<?php

namespace App\Http\Controllers;

use App\Models\Ciudad;

class CiudadController extends Controller
{
    public function obtenerCiudades()
    {
        $ciudades = Ciudad::all();
        return response()->json($ciudades);
    }
}
