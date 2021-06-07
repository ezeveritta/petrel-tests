<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHojaResumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoja_resumens', function (Blueprint $table) {
            $table->id();
            $table->string('url_pdf_rendimiento_acad');
            $table->string('url_pdf_plan_estudio');
            $table->string('url_pdf_programas');
            $table->string('url_pdf_nota_dpto_alum');
            $table->string('url_pdf_hoja_unida');
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
        Schema::dropIfExists('hoja_resumens');
    }
}
