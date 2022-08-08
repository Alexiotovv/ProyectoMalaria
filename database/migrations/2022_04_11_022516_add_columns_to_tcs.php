<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTcs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tcs', function (Blueprint $table) {
        $table->string('dni_tcs')->nullable()->default('-');
        $table->string('nombre_tcs', 200)->nullable()->default('');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tcs', function (Blueprint $table) {
            //
        });
    }
}
