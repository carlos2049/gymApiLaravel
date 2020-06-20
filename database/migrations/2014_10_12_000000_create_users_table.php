<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::create('perfiles', function (Blueprint $table) {
        $table->id();
        $table->string('tipo');
   
  
        // $table->rememberToken();
        $table->timestamps();
    });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->date('fecha_nacimiento');
            $table->string('rut', 15);
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->BigInteger('id_perfil')->unsigned();
            $table->foreign('id_perfil')->references('id')->on('perfiles');
           // $table->timestamp('email_verified_at')->nullable();
        
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
        Schema::dropIfExists('users');
    }
}
