<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';

    protected $fillable = [
        'genero'
    ];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_genero');
    }
}
