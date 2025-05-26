<?php

namespace App\Models\modelosEpv;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\modelosEpv\Localidad;

class Perfil extends Model
{
    use HasFactory;

    // Nombre de la tabla y clave primaria personalizada
    protected $table = 'perfil';
    protected $primaryKey = 'id_perfil';

    // Desactivar timestamps o mapearlos a tus columnas
    public $timestamps = false;
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = null;

    // Campos asignables y ocultos
    protected $fillable = [
        'nombre',
        'nick',
        'apellido',
        'correo',
        'contraseña',
        'descripcion_personal',
        'foto_usuario',
        'sexo',
        'fecha_creacion',
        'localidad_id',
    ];

    protected $hidden = [
        'contraseña',
    ];

    // Relación con Localidad
    public function localidad()
    {
        return $this->belongsTo(Localidad::class, 'localidad_id', 'id_localidad');
    }
}
