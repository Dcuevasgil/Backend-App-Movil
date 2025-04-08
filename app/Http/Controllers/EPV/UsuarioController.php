<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        $datos_usuario = $request->validate([
            'nombre' => 'required|string|max:45',
            'correo' => 'required|email|max:45',
            'contraseña' => 'required|string|min:8|max:8',
            'descripcion_personal' => 'nullable|string',
            'id_genero' => 'required|integer',
            'id_ciudad' => 'required|integer',
            'genero' => 'required|string',
            'nombre_ciudad' => 'required|string',
        ]);

        $usuario = Usuario::create($datos_usuario);

        return response()->json($usuario, 201);
    }

    public function obtenerUsuarios()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }
}
