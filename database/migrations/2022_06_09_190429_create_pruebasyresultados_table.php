<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePruebasyresultadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebasyresultados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pacienteId')->unsigned();
            $table->foreign('pacienteId')->references('id')->on('dtacpacientes');
            $table->string('nombre_prueba', 100)->nullable()->default('');
            $table->date('fecha_toma');
            $table->string('resultado', 100)->nullable()->default('');
            $table->date('fecha_resultado');
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
        Schema::dropIfExists('pruebasyresultados');
    }
}
