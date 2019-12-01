<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->char('id_paciente');
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('imc')->nullable();
            $table->string('temperatura')->nullable();
            $table->string('presion')->nullable();
            $table->string('pulso')->nullable();
            $table->string('siguiente_cita')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('impresion')->nullable();
            $table->string('indicaciones')->nullable();
            $table->integer('Remitido')->default('7');
            $table->string('fechayHora')->nullable();

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
        Schema::dropIfExists('citas');
    }
}
