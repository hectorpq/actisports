<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_tela');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->integer('cantidad_disponible');
            $table->string('color');
            $table->decimal('costo_unitario', 8, 2);
            $table->string('id_materia_prima');
            $table->string('nombre_materia_prima');
            $table->string('proveedor');
            $table->string('medida');
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
        Schema::dropIfExists('materials');
    }
}
