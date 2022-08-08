<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtacsForm1sTable extends Migration
{

    public function up()
    {
        Schema::create('dtacs_form1s', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo', 100)->default('');
            $table->bigInteger('DepartamentoId')->unsigned();
            $table->foreign('DepartamentoId')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('ProvinciaId')->unsigned();
            $table->foreign('ProvinciaId')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('DistritoId')->unsigned();
            $table->foreign('DistritoId')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('tcsId')->unsigned();
            $table->foreign('tcsId')->references('id')->on('tcs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Comunidad', 250)->nullable()->default('');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dtacs_form1s');
    }
}
