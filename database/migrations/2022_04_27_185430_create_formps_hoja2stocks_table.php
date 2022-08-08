<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpsHoja2stocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formps_hoja2stocks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formPS')->unsigned();
            $table->foreign('formPS')->references('id')->on('form_seguimiento_promotor_saluds');
            $table->bigInteger('CompetenciaId')->unsigned();
            $table->foreign('CompetenciaId')->references('id')->on('competencias');
            $table->integer('unidades1')->nullable()->default(0);
            $table->date('fecha1')->nullable();
            $table->integer('unidades2')->nullable()->default(0);
            $table->date('fecha2')->nullable();
            $table->integer('unidades3')->nullable()->default(0);
            $table->date('fecha3')->nullable();
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
        Schema::dropIfExists('formps_hoja2stocks');
    }
}
