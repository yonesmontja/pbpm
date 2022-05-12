<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('status')->nullable();
            $table->decimal('progress')->nullable();
            $table->date('tanggal')->nullable();
            $table->foreignId('siswa_id')->nullable()->constrained('siswa')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('mapel_id')->nullable()->constrained('mapel')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('penilaian_id')->nullable()->constrained('penilaian')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kompetensiinti_id')->nullable()->constrained('kompetensiinti')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('guru_id')->nullable()->constrained('guru')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}
