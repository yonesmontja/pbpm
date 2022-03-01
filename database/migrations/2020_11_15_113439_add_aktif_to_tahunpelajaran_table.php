<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAktifToTahunpelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tahunpelajaran', function (Blueprint $table) {
            //
            $table->string('tahun',5);
            $table->enum('aktif',['Y','N']);
            $table->string('nama_kepsek',50);
            $table->string('kode_kepsek',30);
            $table->datetime('tgl_raport');
            $table->datetime('tgl_raport_kelas3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tahunpelajaran', function (Blueprint $table) {
            //
        });
    }
}
