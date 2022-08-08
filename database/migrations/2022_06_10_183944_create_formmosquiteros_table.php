<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormmosquiterosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formmosquiteros', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo', 100)->nullable()->default('-');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade');
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade');
            $table->string('Localidad', 250)->nullable()->default('');
            $table->date('fecha_entrega');
            $table->string('eess_cercano', 100)->nullable()->default('');
            $table->decimal('tiempo_eesscercano', 8, 2)->nullable();
            $table->string('eess_cercano_microscopio', 100)->nullable()->default('');
            $table->decimal('tiempo_eesscercano_microscopio', 8, 2)->nullable();
            $table->string('Responsable', 100)->default('');
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
        Schema::dropIfExists('formmosquiteros');
    }
}
