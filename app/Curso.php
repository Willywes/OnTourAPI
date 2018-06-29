<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'created_at',
        'updated_at',
    ];

    public function contratos(){
        return $this->hasMany(Contrato::class);
    }

    public function alumnos(){
        return $this->hasMany(Alumno::class);
    }
}
