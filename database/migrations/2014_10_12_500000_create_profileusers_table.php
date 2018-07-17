<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblProfileUser', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fkIdMd')->unsigned();
            $table->integer('fkIdMenu')->unsigned();
            $table->integer('fkMdAction')->unsigned();
            $table->foreign('fkIdMd')->references('id')->on('tblMasterDetail');
            $table->foreign('fkIdMenu')->references('id')->on('tblUserMenu');
            $table->foreign('fkMdAction')->references('id')->on('tblMasterDetail');
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
        Schema::dropIfExists('tblProfileUser');
    }
}
