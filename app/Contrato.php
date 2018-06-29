<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contratos';

    protected $fillable = [
        'id',
        'fecha',
        'nombre_colegio',
        'subtotal',
        'total',
        'representante_id',
        'tour_id',
        'curso_id',
        'created_at',
        'updated_at'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function representante(){
        return $this->belongsTo(User::class);
    }

    public function tour(){
        return $this->belongsTo(Tour::class);
    }
}
