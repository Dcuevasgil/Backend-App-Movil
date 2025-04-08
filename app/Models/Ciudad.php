<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudad';

    protected $fillable = [
        'nombre_ciudad'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_ciudad');
    }
}
