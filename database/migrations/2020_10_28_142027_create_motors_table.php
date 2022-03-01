<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('id_motor');
            $table->integer('id_merk');
            $table->string('nama_motor');
            $table->primary('id_motor');
            $table->timestamps();
        });

        Schema::table('motors',function($table)
        {
            $table->foreign('id_merk')
            ->references('id_merk')
            ->on('merks')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motors');
    }
}
