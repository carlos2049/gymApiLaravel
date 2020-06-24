<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubPlanesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->integer('valor_mensual');
            $table->integer('valor_trimestral');
            $table->integer('valor_semestral');
            $table->integer('valor_anual');
            $table->bigInteger('id_planes')->unsigned();
            
            $table->foreign('id_planes')->references('id')->on('planes');
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
        Schema::dropIfExists('sub_planes');
    }
}
