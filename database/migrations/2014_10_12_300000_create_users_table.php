<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

     /**
      * @author: beniro vielma
      * @sinopsis: creacion de esquema para tblCustomer que contendra la info de los usuarios que se registren
      */
    public function up()
    {
      Schema::create('tblUsers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',250)->unique();
            $table->string('name');
            $table->string('lastname');
            $table->integer('age');
            $table->integer('fkIdMaster')->unsigned();
            $table->string('tokenUser')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('fkIdMaster')->references('id')->on('tblMaster');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblUsers');
    }
}
