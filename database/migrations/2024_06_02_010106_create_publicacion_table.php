<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id('id_estado')->autoIncrement();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('carreras', function (Blueprint $table) {
            $table->id('id_carrera')->autoIncrement();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('linea_investigacion', function (Blueprint $table) {
            $table->id('id_linea_investigacion')->autoIncrement();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('equipos_de_proyectos', function (Blueprint $table) {
            $table->id('id_equipo')->autoIncrement();
            $table->string('nombre');
            $table->unsignedBigInteger('id_linea_investigacion');
            $table->foreign('id_linea_investigacion')->references('id_linea_investigacion')->on('linea_investigacion');
            $table->timestamps();
        });

        Schema::create('personas', function (Blueprint $table) {
            $table->id('id_persona')->autoIncrement();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('cedula');
            $table->string('telefono');
            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id_carrera')->on('carreras');
            $table->timestamps();
        });

        Schema::create('departamentos', function (Blueprint $table) {
            $table->id('id_departamento')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_jefe');
            $table->foreign('id_jefe')->references('id_persona')->on('personas');
            $table->timestamps();
        });

        Schema::create('consultores', function (Blueprint $table) {
            $table->id('id_consultor')->autoIncrement();
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->unsignedBigInteger('id_linea_investigacion');
            $table->foreign('id_linea_investigacion')->references('id_linea_investigacion')->on('linea_investigacion');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->timestamps();
        });

        Schema::create('estudiantes', function (Blueprint $table) {
            $table->id('id_estudiantes')->autoIncrement();
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona')->references('id_persona')->on('personas');
            $table->unsignedBigInteger('id_equipo');
            $table->foreign('id_equipo')->references('id_equipo')->on('equipos_de_proyectos');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->timestamps();
        });

        Schema::create('tipo_publicacion', function (Blueprint $table) {
            $table->id('id_tipo_publicacion')->autoIncrement();
            $table->string('nombre', 64);
            $table->timestamps();
        });

        Schema::create('publicaciones', function (Blueprint $table) {
            $table->id('id_publicacion')->autoIncrement();
            $table->string('nombre');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_autor');
            $table->foreign('id_autor')->references('id_persona')->on('personas');
            $table->timestamp('fecha_publicacion')->default(now());
            $table->unsignedBigInteger('id_tipo_publicacion');
            $table->foreign('id_tipo_publicacion')->references('id_tipo_publicacion')->on('tipo_publicacion');
            $table->string('etiquetas');
            $table->string('portada');
            $table->string('resumen');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_estado')->references('id_estado')->on('estados');
            $table->string('codigo_barra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacion');
    }
};
