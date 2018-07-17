<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblMasterDetail', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->integer('fkIdMaster')->unsigned();
            $table->foreign('fkIdMaster')->references('id')->on('tblMaster');
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
        Schema::dropIfExists('tblMasterDetail');
    }
}
