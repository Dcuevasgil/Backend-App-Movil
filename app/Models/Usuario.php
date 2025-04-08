<?php

// Paquetes
namespace App\Models;

// Importaciones
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'correo', 'contraseña', 'descripcion_personal', 'foto_perfil', 'imagen_cabecera', 'id_genero', 'id_ciudad', 'genero', 'nombre_ciudad'
    ];

    protected $hidden = [
        'contraseña',
    ];

    public function genero()
    {
        return $this->belongsTo(Genero::class, 'id_genero');
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'id_ciudad');
    }
}