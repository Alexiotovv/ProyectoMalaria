<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormlistaentregamosqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formlistaentregamosqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formpersonamqsId')->unsigned();
            $table->foreign('formpersonamqsId')->references('id')->on('formpersonamqs')->onUpdate('cascade');
            $table->integer('doble')->unsigned()->nullable()->default(0);
            $table->integer('familiar1')->unsigned()->nullable()->default(0);
            $table->integer('familiar2')->unsigned()->nullable()->default(0);
            $table->integer('personas_usaran')->unsigned()->nullable()->default(0);
            $table->integer('nro_afiches')->unsigned()->nullable()->default(0);
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
        Schema::dropIfExists('formlistaentregamosqs');
    }
}
