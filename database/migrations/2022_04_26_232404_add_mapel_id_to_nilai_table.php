<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMapelIdToNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nilai', function (Blueprint $table) {
            //
            $table->foreignId('kompetensi_inti_id')->nullable();
            $table->foreignId('mapel_id')->nullable();
            $table->foreignId('penilaian_id')->nullable();
            $table->foreignId('guru_id')->nullable();
            $table->foreignId('siswa_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nilai', function (Blueprint $table) {
            //
        });
    }
}
