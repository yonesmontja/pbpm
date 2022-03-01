<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLangkahstrategisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('langkahstrategis', function (Blueprint $table) {
            $table->id();
            $table->string('langkahstrategis_start');
            $table->string('langkahstrategis_end');
            $table->string('langkahstrategis_aspek');
            $table->text('langkahstrategis_deskripsi');
            $table->text('langkahstrategis_notes');
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
        Schema::dropIfExists('langkahstrategis');
    }
}
