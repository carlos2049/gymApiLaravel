<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('actividad_fisica');
            $table->string('objetivo');
            $table->string('enfermedades');
            $table->string('alergias');
            $table->string('contacto_emergencia');
            $table->string('fono_contacto_eme');
            $table->date('fecha_ingreso');
            $table->string('observaciones');
           
            $table->BigInteger('id_subplan')->unsigned();
            $table->BigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
         
            $table->foreign('id_subplan')->references('id')->on('sub_planes');
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
        Schema::dropIfExists('clientes');
    }
}
