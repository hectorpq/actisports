<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToDisenosTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disenos', function (Blueprint $table) {
            $table->string('imagen')->nullable();  // Agregar la columna 'imagen'
        });
    }

    /**
     * Revierte las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disenos', function (Blueprint $table) {
            $table->dropColumn('imagen');  // Eliminar la columna 'imagen'
        });
    }
}
