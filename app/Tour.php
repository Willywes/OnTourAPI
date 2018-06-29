<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = "tours";

    protected  $fillable = [
        'id',
        'nombre',
        'descripcion',
        'precio_base',
        'dias',
        'destino_id',
        'created_at',
        'updated_at'
    ];

    public function destino(){
        return $this->belongsTo(Destino::class);
    }
}
