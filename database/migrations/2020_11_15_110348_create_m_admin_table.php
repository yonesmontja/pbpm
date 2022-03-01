<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_admin', function (Blueprint $table) {
            $table->id();
            $table->string('username',50);
            $table->string('password',100);
            $table->enum('level',['admin','guru','siswa']);
            $table->string('konid',10);
            $table->enum('aktif',['Y','N']);
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
        Schema::dropIfExists('m_admin');
    }
}
