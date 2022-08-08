<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSegTrabajadorSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_seg_trabajador_saluds', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo', 100)->nullable()->default('');
            $table->string('Localidad', 100)->nullable()->default('');
            $table->bigInteger('estsaludId')->unsigned();
            $table->foreign('estsaludId')->references('id')->on('estsalud')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('NAtencionesReg')->default(0);
            $table->integer('NAtencionesMas')->default(0);

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
        Schema::dropIfExists('form_seg_trabajador_saluds');
    }
}
