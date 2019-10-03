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
            $table->bigIncrements('id_pacientes');
            $table->string('numero_paciente')->unique()->nullable();
            $table->string('contrasenia')->nullable();
            $table->string('primer_apellido');
            $table->string('segundo_apellido')->nullable();
            $table->string('primer_nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('numero_cuenta')->unique();
            $table->string('numero_identidad')->unique();
            $table->string('lugar_procedencia');
            $table->string('direccion');
            $table->string('carrera');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('estado_civil');
            $table->string('seguro_medico')->nullable();
            $table->string('numero_telefono')->unique();
            $table->string('emergencia_telefono')->unique();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('presion')->nullable();
            $table->string('pulso')->nullable();
            $table->boolean('estudiante')->nullable();
            $table->boolean('empleado')->nullable();
            $table->boolean('visitante')->nullable();
            $table->boolean('prosene')->nullable();
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
        Schema::dropIfExists('pacientes');
    }
}
