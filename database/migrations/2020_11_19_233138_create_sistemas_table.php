<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('repositorios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id');
            $table->timestamps();
        });

        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('criticidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('ambientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('authentications', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('perfiles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('lenguajes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('bases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('documentations', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('impactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('sistemas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->string('sigla')->unique();
            $table->text('descripcion');
            $table->foreignId('cliente_id')->constrained();
            $table->text('cliente_info')->nullable();
            $table->foreignId('lider_id')->references('id')->on('users');
            $table->foreignId('criticidad_id')->constrained();
            $table->text('justificacion_criticidad')->nullable();
            $table->foreignId('authentication_id')->constrained();
            $table->foreignId('estado_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->date('f_produccion')->nullable();
            $table->string('url_checksystem')->nullable();
            $table->date('f_baja')->nullable();
            $table->timestamps();
        });

        Schema::create('sistema_recursos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('role_id')->constrained();
            $table->boolean('habilitado')->default(true);
            $table->foreignId('user_id_log')->constrained();
            $table->timestamps();

            $table->unique(['sistema_id', 'user_id', 'role_id']);
        });

        Schema::create('sistema_caracteristicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema_id')->constrained();
            $table->foreignId('caracteristica_id');
            $table->string('caracteristica_type');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();

            $table->unique(['sistema_id', 'caracteristica_id', 'caracteristica_type'], 'pk_sistema_caracteristica');
        });

        Schema::create('sistema_relaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema')->constrained()->comment = 'Es el id del sistema que se relaciona con sistema_id';
            $table->foreignId('sistema_id')->constrained()->comment = 'Es el id del sistema relacionado con sistema';
            $table->text('descripcion');
            $table->foreignId('user_id_log')->constrained();
            $table->timestamps();

            $table->unique(['sistema', 'sistema_id']);
        });

        Schema::create('sistema_repositorios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema')->constrained();
            $table->foreignId('repositorio_id')->constrained();
            $table->string('url_repositorio')->nullable();
            $table->text('comentarios')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('sistema_documentations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema')->constrained();
            $table->foreignId('documentation_id')->constrained();
            $table->string('url_document')->nullable();
            $table->text('comentarios')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('sistema_hitos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema')->constrained();
            $table->string('titulo');
            $table->text('descripcion');
            $table->date('fecha')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        Schema::create('sistema_ambientes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sistema_id')->constrained();
            $table->foreignId('ambiente_id')->constrained();
            $table->string('url')->nullable();
            $table->text('credenciales_bd')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();

            $table->unique(['sistema_id', 'ambiente_id']);
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositorios');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('criticidads');
        Schema::dropIfExists('authentications');
        Schema::dropIfExists('ambientes');
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('perfiles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('lenguajes');
        Schema::dropIfExists('bases');
        Schema::dropIfExists('documentations');
        Schema::dropIfExists('impactos');
        Schema::dropIfExists('sistemas');
        Schema::dropIfExists('sistema_recursos');
        Schema::dropIfExists('sistema_lenguajes');
        Schema::dropIfExists('sistema_bases');
        Schema::dropIfExists('sistema_relaciones');
        Schema::dropIfExists('sistema_repositorios');
        Schema::dropIfExists('sistema_documentations');
        Schema::dropIfExists('sistema_hitos');
        Schema::dropIfExists('sistema_ambientes');

    }
}
