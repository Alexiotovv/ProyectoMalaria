<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToFormpsHoja2s extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formps_hoja2s', function (Blueprint $table) {
            $table->bigInteger('CompetenciaId')->unsigned();
            $table->foreign('COmpetenciaId')->references('id')->on('competencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formps_hoja2s', function (Blueprint $table) {
            //
        });
    }
}
