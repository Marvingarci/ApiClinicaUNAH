<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->char('id_paciente');
            $table->string('numero_paciente')->unique()->nullable();
            $table->string('contrasenia')->nullable();
            $table->string('nombre_completo');
            $table->string('numero_cuenta')->unique();
            $table->string('numero_identidad')->unique();
            $table->longText('imagen');
            $table->string('lugar_procedencia');
            $table->string('direccion');
            $table->string('carrera');
            $table->string('fecha_nacimiento');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('seguro_medico')->nullable();
            $table->string('numero_telefono')->unique();
            $table->string('emergencia_telefono');
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('presion')->nullable();
            $table->string('pulso')->nullable();
            $table->char('categoria');
            $table->timestamps();

            $table->primary('id_paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
