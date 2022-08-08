<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_prov')->default('');
            $table->bigInteger('DptoId')->unsigned();
            $table->foreign('DptoId')->references('id')->on('dptos');
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
        Schema::dropIfExists('provs');
    }
}
