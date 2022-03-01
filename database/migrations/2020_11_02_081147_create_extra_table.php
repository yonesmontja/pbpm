<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra', function (Blueprint $table) {
            $table->id();
            $table->string("nis")->unique();
            $table->text("saran");
            $table->string("ekskul")->nullable();
            $table->double("tinggi_sem1")->nullable();
            $table->double("tinggi_sem2")->nullable();
            $table->double("berat_sem1")->nullable();
            $table->double("berat_sem2")->nullable();
            $table->string("pendengaran");
            $table->string("penglihatan");
            $table->string("gigi");
            $table->text("prestasi")->nullable();
            $table->string("jenis_prestasi")->nullable();
            $table->integer("sakit");
            $table->integer("ijin");
            $table->integer("alfa");

            $table->foreign("nis")->references("nis")->on("siswa")->onDelete('cascade');
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
        Schema::dropIfExists('extra');
    }
}
