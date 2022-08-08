<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormintlocalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formintlocalidads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('intervencionesId')->unsigned();
            $table->foreign('intervencionesId')->references('id')->on('formintervenciones')->onUpdate('cascade');
            $table->string('Localidad', 100)->nullable()->default('');
            $table->string('Poblacion', 100)->nullable()->default('');
            $table->string('Nvivienda', 100)->nullable()->default('');
            $table->string('Lamtul8sem', 100)->nullable()->default('');
            $table->string('Casosul8sem', 100)->nullable()->default('');
            $table->string('Iptul8sem', 100)->nullable()->default('');
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
        Schema::dropIfExists('formintlocalidads');
    }
}
