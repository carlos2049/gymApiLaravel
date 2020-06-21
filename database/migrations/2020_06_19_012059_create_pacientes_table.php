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
            $table->id();
            $table->string('actividad_fisica');
            $table->string('objetivo');
            $table->string('enfermedades');
            $table->string('alergias');
            $table->string('contacto_emergencia');
            $table->string('fono_contacto_eme');
            $table->date('fecha_ingreso');

            $table->BigInteger('id_user')->unsigned()->unique();
            $table->foreign('id_user')->references('id')->on('users');
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
