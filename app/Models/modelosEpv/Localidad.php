<?php

namespace App\Models\modelosEpv;

use Illuminate\Database\Eloquent\Model;
use App\Models\modelosEpv\Perfil;

class Localidad extends Model
{
    // Nombre de la tabla y clave primaria personalizada
    protected $table = 'localidades';
    protected $primaryKey = 'id_localidad';

    // Desactivar timestamps si no tienes updated_at/created_at
    public $timestamps = false;

    // Campos asignables
    protected $fillable = [
        'nombre_localidad',
    ];

    // (Opcional) Relación inversa
    public function perfiles()
    {
        return $this->hasMany(Perfil::class, 'localidad_id', 'id_localidad');
    }
}
