<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioAdicional extends Model
{
   protected $table = "servicios_adicionales";

   protected $fillable = [
       'id',
       'nombre',
       'precio',
       'tipo',
       'created_at',
       'update_at'
   ];
}
