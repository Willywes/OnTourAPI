<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('paterno');
            $table->string('materno')->nullable();
            $table->string('nombres');
            $table->string('telefono', 11)->nullable();
            $table->string('celular', 11)->nullable();

            $table->integer('rol_id')->unsigned()->nullable();
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('set null');

            $table->string('api_token', 60)->unique()->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }

    private function load()
    {
        $user = new App\User();

        $user->email = 'super@admin.cl';
        $user->password = bcrypt('admin123');
        $user->nombres = 'Super';
        $user->paterno = 'Admin';
        $user->rol_id = 1;

        $user->save();

        $user = new App\User();

        $user->email = 'admin@admin.cl';
        $user->password = bcrypt('admin123');
        $user->nombres = 'Admin';
        $user->paterno = 'Admin';
        $user->rol_id = 2;

        $user->save();
    }
}
