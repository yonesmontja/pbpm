<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swot', function (Blueprint $table) {
            $table->id();
            $table->string('swot_start');
            $table->string('swot_end');
            $table->string('swot_komponen');
            $table->text('swot_deskripsi');
            $table->text('swot_notes');
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
        Schema::dropIfExists('swot');
    }
}
