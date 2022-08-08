<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciaacsNombresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciaacs_nombres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAsistencia')->unsigned();
            $table->foreign('idAsistencia')->references('id')->on('asistenciaacs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('idACS')->unsigned();
            $table->foreign('idACS')->references('id')->on('tcs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ts_ComunidadProcedencia',100)->nullable()->default('');
            $table->string('ts_ESSCercano', 200)->nullable()->default('');
            $table->date('ts_FechaAsistencia');
            $table->string('ts_responsable_cap', 100)->nullable()->default('');
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
        Schema::dropIfExists('asistenciaacs_nombres');
    }
}
