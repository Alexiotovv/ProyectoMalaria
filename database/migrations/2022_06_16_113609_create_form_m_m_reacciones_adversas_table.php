<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormMMReaccionesAdversasTable extends Migration
{

    public function up()
    {
        Schema::create('form_m_m_reacciones_adversas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('MMosquiteroId')->unsigned();
            $table->foreign('MMosquiteroId')->references('id')->on('form_monitoreo_uso_mosqs')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Nombre', 100)->nullable()->default('');
            $table->string('Edad', 100)->nullable()->default('');
            $table->string('Genero', 10)->nullable()->default('');
            $table->string('MolestiaPresentada', 250)->nullable()->default('');
            $table->string('TiempoInicioMolestias', 100)->nullable()->default('');
            $table->string('Evolucion1', 100)->nullable()->default('');
            $table->string('Evolucion2', 100)->nullable()->default('');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_m_m_reacciones_adversas');
    }
}
