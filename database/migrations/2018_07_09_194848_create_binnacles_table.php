<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinnaclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblBinnacle', function (Blueprint $table) {
            $table->increments('id');
            $table->string('time');
            $table->string('action');
            $table->integer('fkIdUser')->unsigned();
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
        Schema::dropIfExists('tblBinnacles');
    }
}
