<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoevaluMosqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitoevalu_mosqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Ipress')->unsigned();
            $table->foreign('Ipress')->references('id')->on('estsalud')->onUpdate('cascade');
            $table->string('Comunidad', 100)->nullable()->default('-');
            $table->date('FechaEntrega')->nullable();
            $table->date('FechaMonitoreo')->nullable();
            $table->string('NumeroMonitoreo', 100)->nullable()->default('text');
            $table->string('Responsable', 100)->nullable()->default('-');
            $table->string('CargoResponsable', 100)->nullable()->default('-');
            $table->string('user', 100)->default('');
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
        Schema::dropIfExists('monitoevalu_mosqs');
    }
}
