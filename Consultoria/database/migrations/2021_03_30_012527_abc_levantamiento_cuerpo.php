<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AbcLevantamientoCuerpo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abc_levantamiento_cuerpo', function(Blueprint $table){
            $table->increments('id');
            $table->integer('id_levantamiento');
            $table->string('actividad');
            $table->string('unidad_medida');
            $table->integer('id_frecuencia');
            $table->integer('volumen');
            $table->integer('minutos');
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
        Schema::dropIfExists('abc_levantamiento_cuerpo');
    }
}
