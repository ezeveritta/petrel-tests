<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojaResumenProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_resumen_programa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hojaResumen_id');
            $table->unsignedBigInteger('programa_id');

            $table->unique(['hojaResumen_id', 'programa_id']);

            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
            $table->foreign('hojaResumen_id')->references('id')->on('hojas_resumen')->onDelete('cascade');
            
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
        Schema::dropIfExists('hoja_resumen_programa');
    }
}
