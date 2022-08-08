<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormSeguimientoPromotorSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_seguimiento_promotor_saluds', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo', 100)->nullable()->default('-');
            $table->string('Localidad', 250)->nullable()->default('');
            
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade');

            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade');

            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade');

            $table->bigInteger('NombreEstablecimiento')->unsigned();
            $table->foreign('NombreEstablecimiento')->references('id')->on('estsalud')->onUpdate('cascade');

            $table->integer('TiempoEesLocalidad')->nullable()->default(0);
            $table->integer('TiempoLocalidadEess')->nullable()->default(0);
            
            $table->bigInteger('MedioTransporte')->unsigned();
            $table->foreign('MedioTransporte')->references('id')->on('medios_transportes')->onUpdate('cascade');
            
            ///////////////////////////////////////////////////////////////////////////
            $table->date('FechaVisita1')->nullable();
            $table->string('NombreTcsVisita1', 200)->nullable()->default('');
            $table->string('CodigoTcsVisita1', 100)->nullable()->default('');
            $table->string('NombreTsVisita1', 200)->nullable()->default('');
            $table->string('CodigoHisTsVisita1', 200)->nullable()->default('');
            ///////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////
            $table->date('FechaVisita2')->nullable();
            $table->string('NombreTcsVisita2', 200)->nullable()->default('');
            $table->string('CodigoTcsVisita2', 100)->nullable()->default('');
            $table->string('NombreTsVisita2', 200)->nullable()->default('');
            $table->string('CodigoHisTsVisita2', 200)->nullable()->default('');
            ///////////////////////////////////////////////////////////////////////
            ///////////////////////////////////////////////////////////////////////////
            $table->date('FechaVisita3')->nullable();
            $table->string('NombreTcsVisita3', 200)->nullable()->default('');
            $table->string('CodigoTcsVisita3', 100)->nullable()->default('');
            $table->string('NombreTsVisita3', 200)->nullable()->default('');
            $table->string('CodigoHisTsVisita3', 200)->nullable()->default('');
            ///////////////////////////////////////////////////////////////////////
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
        Schema::dropIfExists('form_seguimiento_promotor_saluds');
    }
}
