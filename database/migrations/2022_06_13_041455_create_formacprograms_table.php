<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormacprogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacprograms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('localidadId')->unsigned();
            $table->foreign('localidadId')->references('id')->on('formintlocalidads')->onUpdate('cascade');
            $table->string('act_programadas', 100)->nullable()->default('');
            $table->string('laminas', 100)->nullable()->default('');
            $table->string('casas_fumigar', 100)->nullable()->default('');
            $table->date('FechaIntervencion');
            $table->string('LaminasTomadas', 100)->nullable()->default('');
            $table->string('Vivax', 100)->nullable()->default('');
            $table->string('Falciparum', 100)->nullable()->default('');
            $table->string('ProbMuestreada', 100)->nullable()->default('');
            $table->string('IndicePos', 100)->nullable()->default('');
            $table->string('TasaPre', 100)->nullable()->default('');
            $table->string('ActDesa', 100)->nullable()->default('');
            $table->string('CasasRociadas', 100)->nullable()->default('');
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
        Schema::dropIfExists('formacprograms');
    }
}
