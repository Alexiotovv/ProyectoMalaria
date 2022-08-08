<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formatos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('NombreEtiqueta', 250)->nullable()->default('');
            $table->string('TamanoLetra', 250)->nullable()->default('14');
            $table->string('Negrita', 250)->nullable()->default('1');
            $table->string('TipoDato', 250)->nullable()->default('Text');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formatos');
    }
}
