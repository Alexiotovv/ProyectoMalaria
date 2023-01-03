<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformeoperacionalsMainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informeoperacionals_mains', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('Departamento')->unsigned();
            $table->foreign('Departamento')->references('id')->on('dptos')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Provincia')->unsigned();
            $table->foreign('Provincia')->references('id')->on('provs')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('Distrito')->unsigned();
            $table->foreign('Distrito')->references('id')->on('dists')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('EstSalud')->unsigned();
            $table->foreign('EstSalud')->references('id')->on('estsalud')->onUpdate('cascade');
            $table->string('Mes', 10)->nullable()->default('');
            $table->string('Ano', 5)->nullable()->default('');
            $table->string('Gerencia', 100)->nullable()->default('text');        
            $table->string('user', 50)->nullable()->default('');
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
        Schema::dropIfExists('informeoperacionals_mains');
    }
}
