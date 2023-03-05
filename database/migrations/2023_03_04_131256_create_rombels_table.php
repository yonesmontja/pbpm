<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRombelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->string('rombel')->nullable();
            $table->foreignId('tahunpelajaran_id')->nullable()->constrained('tahunpelajaran')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelas_id')->nullable()->constrained('kelas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rombels');
    }
}
