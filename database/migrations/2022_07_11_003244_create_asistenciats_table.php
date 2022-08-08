<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsistenciatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistenciats', function (Blueprint $table) {
            $table->id();
            $table->string('ts_NombreCapacitacion', 200)->nullable()->default('');
            $table->date('ts_Fecha');
            $table->bigInteger('ts_estsaludId')->unsigned();
            $table->foreign('ts_estsaludId')->references('id')->on('estsalud')->onUpdate('cascade')->onDelete('cascade');
            $table->string('user', 100)->default('');
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
        Schema::dropIfExists('asistenciats');
    }
}
