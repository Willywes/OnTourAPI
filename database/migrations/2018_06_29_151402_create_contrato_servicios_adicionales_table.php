<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratoServiciosAdicionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_servicios_adicionales', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('contrato_id')->unsigned()->unique();
            $table->foreign('contrato_id')->references('id')->on('contratos')->onDelete('cascade');

            $table->integer('servicio_adicional_id')->unsigned()->unique();
            $table->foreign('servicio_adicional_id')->references('id')->on('servicios_adicionales')->onDelete('cascade');


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
        Schema::dropIfExists('contrato_servicios_adicionales');
    }
}
