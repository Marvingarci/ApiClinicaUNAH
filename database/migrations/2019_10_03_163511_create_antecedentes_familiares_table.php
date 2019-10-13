<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntecedentesFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_familiares', function (Blueprint $table) {
            $table->bigIncrements('id_antecedente_familiar');
            $table->string('diabetes');
            $table->string('observacion_diabetes')->nullable();
            $table->string('tb_pulmonar');
            $table->string('observacion_tb_pulmonar')->nullable();
            $table->string('desnutricion');
            $table->string('observacion_desnutricion')->nullable();
            $table->string('tipo_desnutricion')->nullable();
            $table->string('enfermedades_mentales');
            $table->string('observacion_enfermedades_mentales')->nullable();
            $table->string('tipo_enfermedad_mental')->nullable();
            $table->string('convulciones');
            $table->string('observacion_convulciones')->nullable();
            $table->string('alcoholismo_sustancias_psicoactivas');
            $table->string('observacion_alcoholismo_sustancias_psicoactivas')->nullable();
            $table->string('alergias');
            $table->string('observacion_alergias')->nullable();
            $table->string('tipo_alergia')->nullable();
            $table->string('cancer');
            $table->string('observacion_cancer')->nullable();
            $table->string('tipo_cancer')->nullable();
            $table->string('hipertesion_arterial');
            $table->string('observacion_hipertension_arterial')->nullable();
            $table->string('otros')->nullable();
            $table->string('observacion_otros')->nullable();
            $table->bigInteger('id_paciente')->nullable();

//            $table->unsignedBigInteger('id_paciente');
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
        Schema::dropIfExists('antecedentes_familiares');
    }
}
