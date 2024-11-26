<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disenos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->date('fecha_creacion');
            $table->string('autor');
            $table->string('estado');
            $table->string('talla');
            $table->string('genero');
            $table->string('imagen')->nullable();  // Nueva columna para la imagen
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('disenos');
    }
    
};
