<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpsHoja2sTable extends Migration
{
    public function up()
    {
        Schema::create('formps_hoja2s', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formPS')->unsigned();
            $table->foreign('formPS')->references('id')->on('form_seguimiento_promotor_saluds');
            $table->string('visita1',10)->nullable()->default('--');
            $table->string('visita2',10)->nullable()->default('--');
            $table->string('visita3',10)->nullable()->default('--');
            $table->string('obs1',200)->nullable()->default('--');
            $table->string('obs2',200)->nullable()->default('--');
            $table->string('obs3',200)->nullable()->default('--');
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
        Schema::dropIfExists('formps_hoja2s');
    }
}
