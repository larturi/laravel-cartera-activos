<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('apellido');
            $table->string('legajo');
            $table->string('user');
            $table->string('perfil')->comment = 'Perfil del usuario, ej: Administrador, Carga, Solo Lectura';
            $table->string('role')->comment = 'Rol del recurso, ej: Analista, Desarrollador, Tester';
            $table->boolean('es_jefe')->default(false);
            $table->boolean('habilitado')->default(true);
            $table->boolean('approved')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
