<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSikapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sikap', function (Blueprint $table) {
            $table->id();
            $table->string("nis")->unique();
            $table->text("sikap_spiritual");
            $table->text("sikap_sosial");

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
        Schema::dropIfExists('sikap');
    }
}
