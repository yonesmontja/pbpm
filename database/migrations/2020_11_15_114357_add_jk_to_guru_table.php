<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJkToGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('guru', function (Blueprint $table) {
            //
            $table->string('kode_guru',20);
            $table->enum('jk',['L','P']);
            $table->enum('is_bk',['2','1']);
            $table->enum('stat_data',['A','P','M']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('guru', function (Blueprint $table) {
            //
        });
    }
}
