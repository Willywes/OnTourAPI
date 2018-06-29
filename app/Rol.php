<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';

    protected $fillable = [
        'id',
        'nombre',
        'created_at',
        'updated_at'
    ];

    public function usuarios(){
        return $this->hasMany('App\User');
    }
}
