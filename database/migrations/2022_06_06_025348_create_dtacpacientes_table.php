<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtacpacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dtacpacientes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formdtacpacienteId')->unsigned();
            $table->foreign('formdtacpacienteId')->references('id')->on('dtacs_form1s');
            $table->string('dni', 20)->nullable()->default('');
            $table->string('nombres', 100)->nullable()->default('');
            $table->string('apellidos', 100)->nullable()->default('');
            $table->decimal('edad', 3, 2)->nullable()->default(1.00);
            $table->string('sexo', )->nullable()->default('H');
            $table->boolean('gestante')->nullable()->default(false);
            $table->date('inicio_sintomas')->nullable();
            $table->string('lugar_probable_infeccion', 100)->nullable()->default('');
            $table->string('nuevo_repetidor', 1)->nullable()->default('N');
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
        Schema::dropIfExists('dtacpacientes');
    }
}
