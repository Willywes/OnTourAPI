<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $table = 'destinos';

    protected $fillable = [

        'id',
        'nombre',
        'descripcion',
        'foto',
        'created_at',
        'updated_at'
    ];
}
