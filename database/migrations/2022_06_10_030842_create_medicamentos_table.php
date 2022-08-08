<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pacienteId')->unsigned();
            $table->foreign('pacienteId')->references('id')->on('dtacpacientes');
            $table->string('medicamento_recibido', 200)->nullable()->default('');
            $table->date('fecha');
            $table->string('dosis', 100)->nullable()->default('');
            $table->string('comp_incom', 100)->nullable()->default('');
            $table->string('control', 20)->nullable()->default('');
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
        Schema::dropIfExists('medicamentos');
    }
}
