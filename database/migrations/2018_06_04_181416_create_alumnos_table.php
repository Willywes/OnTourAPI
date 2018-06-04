<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paterno');
            $table->string('materno');
            $table->string('nombres');
            $table->string('rut', 15);
            $table->dateTime('fecha_nacimiento');

            $table->integer('apoderado_id')->unsigned()->unique();
            $table->foreign('apoderado_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('curso_id')->unsigned()->nullable();
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
