<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNisnToSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('siswa', function (Blueprint $table) {
            //
            $table->string('nisn');
            $table->string('kelas');
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('pend_sebelum');
            $table->string('nama_ayah');
            $table->string('nik');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_ortu');
            $table->string('nama_wali');
            $table->string('pekerjaan_wali');
            $table->string('alamat_wali');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            //
        });
    }
}
