<?php

namespace App\Http\Controllers\ApiEPV;

use App\Http\Controllers\Controller;
use App\Models\modelosEpv\Perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Para hashear la contraseña

use Illuminate\Database\QueryException;

class UsuarioController extends Controller
{
    // Obtener todos los perfiles de usuario
    public function obtenerUsuarios()
    {
        try {
            $perfiles = Perfil::with('localidad')->get();
            return response()->json($perfiles);

        } catch (QueryException $e) {
            // Aquí ya tienes getSql() y getBindings()
            return response()->json([
                'error'    => 'Hubo un problema al obtener los usuarios (QueryException)',
                'message'  => $e->getMessage(),
                'sql'      => $e->getSql(),
                'bindings'=> $e->getBindings(),
            ], 500);

        } catch (\Exception $e) {
            // Cualquier otra excepción
            return response()->json([
                'error'   => 'Hubo un problema al obtener los usuarios',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    // Crear un perfil de usuario nuevo
    public function registrarPerfil(Request $request)
    {


        // Validación de los datos recibidos en el POST
        $datos_validados = $request->validate([
            'nombre' => 'required|string|max:20',
            'apellido' => 'required|string|max:30',
            'nick' => 'required|string|max:12',
            'correo' => 'required|email|unique:perfil,correo|max:45',
            'contraseña' => 'required|string|min:8|confirmed', // Se espera campo contraseña_confirmation
            'descripcion_personal' => 'nullable|string',
            'sexo' => 'nullable|in:H,M',
            'foto_usuario' => 'nullable|string',
            'fecha_creacion' => 'nullable|date',
            'localidad_id' => 'nullable|exists:localidades,id_localidad',
        ]);


        try {


            // Se crea el perfil, hasheando la contraseña antes de guardar
            $usuario = Perfil::create([
                'nombre' => $datos_validados['nombre'],
                'apellido' => $datos_validados['apellido'],
                'nick' => $datos_validados['nick'],
                'correo' => $datos_validados['correo'],
                'contraseña' => Hash::make($datos_validados['contraseña']),
                'descripcion_personal' => $datos_validados['descripcion_personal'] ?? null,
                'sexo' => $datos_validados['sexo'] ?? null,
                'foto_usuario' => $datos_validados['foto_usuario'] ?? null,
                'fecha_creacion' => now(),
                'localidad_id' => $datos_validados['localidad_id'] ?? null,
            ]);


            // Retornamos el recurso creado con HTTP 201
            return response()->json([
                'message' => 'Usuario ' . $usuario->nombre . ' registrado exitosamente',
                'usuario' => $usuario,
            ], 201);


        } catch (QueryException $e) {

            
            // Error de base de datos al insertar
            return response()->json([
                'error' => 'Hubo un problema al registrar el usuario (QueryException)',
                'message' => $e->getMessage(),
                'sql' => $e->getSql(),
                'bindings'=> $e->getBindings(),
            ], 500);


        } catch (\Exception $e) {


            // Cualquier otra excepción inesperada
            return response()->json([
                'error' => 'Hubo un problema al registrar el usuario.',
                'message' => $e->getMessage(),
            ], 500);


        }
    }


    /**
     * Actualizar uno o varios campos del perfil
     * Se pueden actualizar:
     * 1. nombre
     * 2. contraseña
     * 3. descripcion personal
     * 4. foto de usuario
    */
    public function actualizarPerfil(Request $request, $id)
    {

        // Validacion de los campos que se envian
        $datos_validados = $request->validate([
            'nombre'=>'sometimes|string|max:20',
            'nick'=>'sometimes|string|max:12',
            'apellido'=>'sometimes|string|max:30',
            'contraseña'=>'sometimes|string|min:8|confirmed',
            'descripcion_personal'=>'sometimes|nullable|string',
            'foto_usuario'=>'sometimes|nullable|string',
        ]);


        // Intentando encontrar el usuario con el id
        try {
            $perfil = Perfil::findOrFail($id);

            // Si se manda la contraseña, la hasheo y elimino la confirmacion
            if(isset($datos_validados['contraseña'])) {
                $perfil->contraseña = Hash::make($datos_validados['contraseña']);
                unset($datos_validados['contraseña']);
                unset($datos_validados['contraseña_confirmation']);
            }

            // Asigno el resto de campos dinamicamente
            foreach ($datos_validados as $campo => $valor) {
                $perfil->{$campo} = $valor;
            }

            // Guardo el perfil modificado
            $perfil->save();

            // Devuelvo 200 si el perfil se ha actualizado correctamente
            return response()->json([
                'message'=>'Perfil actualizado con éxito',
                'usuario'=>$perfil,
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'error'   => 'No se pudo actualizar el perfil',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Eliminar un usuario por su ID en "perfil"
    */
    public function eliminarPerfil($id)
    {
        try {
            // Si se encuentra el id del perfil del usuario, lo elimino
            $perfil = Perfil::findOrFail($id);
            $perfil->delete();

            // Devuelvo el mensaje de confirmacion
            return response()->json([
                'message'=>'Perfil eliminado con éxito',
            ], 200);
        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Si no se encuentra el id del usuario, lanzo una excepcion
            return response()->json([
                'error'=>'No se pudo eliminar el perfil del usuario con ese id',
                'message'=>$e->getMessage(),
            ], 404);

            // Si hay otra excepcion, lanzo esa excepcion
        } catch(\Exception $e) {
            return response()->json([
                'error'=>'Error al eliminar el perfil',
                'message'=>$e->getMessage(),
            ]);
        }
    }


}
