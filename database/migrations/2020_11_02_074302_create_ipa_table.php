<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipa', function (Blueprint $table) {
            $table->id();
            $table->string("nis")->unique();
            $table->string("nisn")->unique();
            $table->double("nilai_pengetahuan");
            $table->text("deskripsi_pengetahuan");
            $table->double("nilai_keterampilan");
            $table->text("deskripsi_keterampilan");
            $table->string('ppeng');
            $table->string('pketr');
            $table->foreign("nis")->references("nis")->on("siswa")->onDelete('cascade');
            $table->foreign("nisn")->references("nisn")->on("siswa")->onDelete('cascade');
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
        Schema::dropIfExists('ipa');
    }
}
