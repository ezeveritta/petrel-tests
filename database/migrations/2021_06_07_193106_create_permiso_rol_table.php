<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermisoRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permiso_rol', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permiso_id');
            $table->unsignedBigInteger('rol_id');

            $table->unique(['permiso_id', 'rol_id']);
            
            $table->foreign('permiso_id')->references('id')->on('permisos')->onDelete('cascade');;
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');;
            
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
        Schema::dropIfExists('permiso_rol');
    }
}
