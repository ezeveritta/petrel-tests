<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolPermisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rol_permisos', function (Blueprint $table) {
            $table->integer('rol_id');
            $table->integer('permiso_id');

            $table->primary(['rol_id', 'permiso_id']);
            /*
            $table->foreign('rol_id')->references('id')->on('rols');
            $table->foreign('permiso_id')->references('id')->on('permisos');
            */
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
        Schema::dropIfExists('rol_permisos');
    }
}
