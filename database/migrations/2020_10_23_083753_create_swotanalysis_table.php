<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwotanalysisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swotanalysis', function (Blueprint $table) {
            $table->id();
            $table->string('swotanalysis_start');
            $table->string('swotanalysis_end');
            $table->string('swotanalysis_kuadran');
            $table->text('swotanalysis_deskripsi');
            $table->text('swotanalysis_notes');
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
        Schema::dropIfExists('swotanalysis');
    }
}
