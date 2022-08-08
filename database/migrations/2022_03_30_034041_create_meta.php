<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('actividades_id')->unsigned();
            $table->foreign('actividades_id')->references('id')->on('objetivos')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nombre_meta',250)->nullable()->default('');
            $table->boolean('activo_meta')->nullable()->default(true); 
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
        Schema::dropIfExists('meta');
    }
}
