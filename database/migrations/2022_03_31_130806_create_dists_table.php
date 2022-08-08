<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dists', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 100)->nullable()->default('');
            $table->string('nombre_dist', 120)->nullable()->default('');
            $table->bigInteger('ProvId')->unsigned();
            $table->foreign('ProvId')->references('id')->on('provs');
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
        Schema::dropIfExists('dists');
    }
}
