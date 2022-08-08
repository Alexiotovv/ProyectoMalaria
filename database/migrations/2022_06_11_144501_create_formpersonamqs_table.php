<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormpersonamqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formpersonamqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formmosquiterosId')->unsigned();
            $table->foreign('formmosquiterosId')->references('id')->on('formmosquiteros')->onUpdate('cascade');
            $table->string('dni', 15)->nullable()->default('');
            $table->string('nombres', 100)->nullable()->default('');
            $table->string('apellidos', 100)->nullable()->default('');
            $table->integer('numero_personas')->nullable()->default(0);
            $table->string('mq_noimpregnados_tamano', 2)->nullable()->default('');//PERSONAL FAMILIAR censo mosquitero antes entrega_tamaño
            $table->string('mq_noimpregnados_estado', 2)->nullable()->default('');
            $table->string('mq_impregnados_tamano', 2)->nullable()->default('');//PERSONAL DOBLE
            $table->string('mq_impregnados_estado', 2)->nullable()->default('');//PERSONAL DOBLE
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
        Schema::dropIfExists('formpersonamqs');
    }
}
