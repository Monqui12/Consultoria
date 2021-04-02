<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbcLevantamientoCabecero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abc_levantamiento_cabecero', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_evento')->nullable();
            $table->integer('id_estado');
            $table->integer('id_usuario');
            $table->integer('id_horario');
            $table->integer('id_tipo');
            $table->datetime('fecha');
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
        Schema::dropIfExists('abc_levantamiento_cabecero');
    }
}
