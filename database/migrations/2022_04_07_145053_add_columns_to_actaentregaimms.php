<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToActaentregaimms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actaentregaimms', function (Blueprint $table) {
            $table->bigInteger('DepartamentoId')->unsigned();
            $table->foreign('DepartamentoId')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('ProvinciaId')->unsigned();
            $table->foreign('ProvinciaId')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('DistritoId')->unsigned();
            $table->foreign('DistritoId')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            
            $table->string('Localidad', 200)->nullable()->default('');
            $table->string('NombreTCS', 200)->nullable()->default('');
            $table->string('Comunidad', 200)->nullable()->default('');
            $table->string('NombreESS', 200)->nullable()->default('');
            $table->string('TiempoHorasESS', 200)->nullable()->default('');
            $table->string('IMM', 200)->nullable()->default('');
            $table->integer('Cantidad')->default(12);
            $table->string('DNI', 20)->nullable()->default(''); 
            $table->dateTime('Fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actaentregaimms', function (Blueprint $table) {
            //
        });
    }
}
