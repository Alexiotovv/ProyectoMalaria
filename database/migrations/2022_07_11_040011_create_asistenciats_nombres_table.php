<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciatsNombresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciats_nombres', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idAsistencia')->unsigned();
            $table->foreign('idAsistencia')->references('id')->on('asistenciats')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ts_DNI',20)->nullable()->default('');
            $table->string('ts_Nombre',20)->nullable()->default('');
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
        Schema::dropIfExists('asistenciats_nombres');
    }
}
