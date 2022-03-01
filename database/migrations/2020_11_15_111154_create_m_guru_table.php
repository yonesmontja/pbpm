<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama',50);
            $table->string('kode_gur',20);
            $table->enum('jk',['L','P']);
            $table->enum('is_bk',['2','1']);
            $table->enum('stat_data',['A','P','M']);
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
        Schema::dropIfExists('m_guru');
    }
}
