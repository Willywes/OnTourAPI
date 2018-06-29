<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        $this->load();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rols');
    }

    private function load(){

        $rol = new \App\Rol();
        $rol->nombre = 'SuperAdmin';
        $rol->save();

        $rol = new \App\Rol();
        $rol->nombre = 'Administrador';
        $rol->save();

        $rol = new \App\Rol();
        $rol->nombre = 'Ejecutivo de Venta';
        $rol->save();

        $rol = new \App\Rol();
        $rol->nombre = 'Encargado de Curso';
        $rol->save();

        $rol = new \App\Rol();
        $rol->nombre = 'Apoderado';
        $rol->save();
    }
}
