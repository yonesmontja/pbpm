<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRombelSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rombel_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rombel_id')->nullable()->constrained('rombels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('siswa_id')->nullable()->constrained('siswa')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('rombel_siswa');
    }
}
