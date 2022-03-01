<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKompetensiintiIdToKompetensidasarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kompetensidasar', function (Blueprint $table) {
            //
            $table->integer('kompetensiinti_id');
            $table->integer('level_id');
            $table->integer('mapel_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kompetensidasar', function (Blueprint $table) {
            //
        });
    }
}
