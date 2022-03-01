<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdLevelToKompetensiintiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kompetensiinti', function (Blueprint $table) {
            //
            $table->integer('id_level');
            $table->integer('id_kinti');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kompetensiinti', function (Blueprint $table) {
            //
        });
    }
}
