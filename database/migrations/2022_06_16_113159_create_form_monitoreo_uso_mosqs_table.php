<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



class CreateFormMonitoreoUsoMosqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_monitoreo_uso_mosqs', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo', 100)->nullable()->default('');
            $table->date('Fecha');
            $table->string('NumeroMonitoreo', 100)->nullable()->default('');
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Localidad', 100)->nullable()->default('');
            $table->string('Nombres', 100)->nullable()->default('');
            $table->string('Apellidos', 100)->nullable()->default('');
            $table->string('Genero', 100)->nullable()->default('');
            $table->decimal('Edad', 5, 2)->nullable()->default(1.00);
            //PERSONAS Y MOSQUITEROS POR VIVIENDA
            $table->string('TotalPersonas', 100)->nullable()->default('');
            $table->string('TotalMenores5', 100)->nullable()->default('');
            $table->string('TotalNinos5_15', 100)->nullable()->default('');
            $table->string('TotalGestante', 100)->nullable()->default('');
            $table->string('TotalCamas', 100)->nullable()->default('');
            $table->string('TotalHamacas', 100)->nullable()->default('');
            $table->string('TotalMosquiteros', 100)->nullable()->default('');
            $table->string('TotalMosqImpregnados', 100)->nullable()->default('');
            //USO MOSQUITERO DIA ANTERIOR
            $table->string('DBM_Personas', 100)->nullable()->default('');
            $table->string('DBM_menores5', 100)->nullable()->default('');
            $table->string('DBM_menores5_15', 100)->nullable()->default('');
            $table->string('Gestantes', 100)->nullable()->default('');
            $table->string('CubiertosCamas', 100)->nullable()->default('');
            $table->string('CubiertosHamacas', 100)->nullable()->default('');
            $table->string('UsoMosqAyer', 100)->nullable()->default('');
            $table->string('UsoMosqAyer_Porqueno', 100)->nullable()->default('');
            //ACEPTABILIAD Y USO DE MOSQUITEROS IMPREGNADOS
            $table->string('EntregaMosquiteroUltimosMeses', 20)->nullable()->default('');
            $table->string('N_MosquiterosEntregados', 20)->nullable()->default('');
            $table->string('MesMosquiterosEntregados', 50)->nullable()->default('');
            $table->string('UsoMosquiteroEntregado', 20)->nullable()->default('');
            $table->string('UsoMosquiteroEntregado_xNO', 20)->nullable()->default('');
            $table->string('ConformeMosquiteroEntregado', 20)->nullable()->default('');
            $table->string('ConformeMosquiteroEntregado_xNO', 20)->nullable()->default('');
            $table->string('ConformeMaterialMosquiteroEntregado', 20)->nullable()->default('');
            $table->string('ConformeMaterialMosquiteroEntregado_xNO', 20)->nullable()->default('');
            $table->string('ConformeColorMosquiteroEntregado', 20)->nullable()->default('');
            $table->string('ConformeColorMosquiteroEntregado_xNO', 20)->nullable()->default('');
            $table->string('ConformeTamanoMosquiteroEntregado', 20)->nullable()->default('');
            $table->string('ConformeTamanoMosquiteroEntregado_xNO', 20)->nullable()->default('');
            $table->string('ConformeTamanoAgujeroMosqEntregado', 20)->nullable()->default('');
            $table->string('ConformeTamanoAgujeroMosqEntregado_xNO', 20)->nullable()->default('');
            $table->string('LlegaSueloMosqEntregado', 20)->nullable()->default('');
            $table->string('BordesEntranDebajoCama', 20)->nullable()->default('');
            $table->string('ConformeCantidadMosqEntregado', 20)->nullable()->default('');
            $table->string('ConformeCantidadMosqEntregado_xNO', 20)->nullable()->default('');
            //PATRON LAVADO
            $table->string('VecesLavadoMosquitero', 20)->nullable()->default('');
            $table->string('FrecuenciaLavadoMosquitero', 50)->nullable()->default('');
            //REACCIONES ADVERSAS
            $table->string('ReaccionMolestia', 20)->nullable()->default('');
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
        Schema::dropIfExists('form_monitoreo_uso_mosqs');
    }
}
