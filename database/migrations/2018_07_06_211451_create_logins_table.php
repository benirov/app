<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
      * @author: beniro vielma
      * @sinopsis: creacion de esquema para tblUser quw contendra la info de inicio de sesion del usuario
      */

    public function up()
    {
        Schema::create('tblSesion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('password');
            $table->integer('fkIdUser')->unsigned();
            $table->timestamps();
            $table->foreign('fkIdUser')->references('id')->on('tblUsers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblSesion');
    }
}
