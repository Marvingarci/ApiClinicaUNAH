<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_admins', function (Blueprint $table) {
            $table->bigIncrements('id_loginAdmin');
            $table->string('usuario_admin');
            $table->string('contrasenia_admin');
            $table->string('nombre_admin');
            $table->string('identidad_admin');
            $table->string('especialidad_admin');
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
        Schema::dropIfExists('login_admins');
    }
}
