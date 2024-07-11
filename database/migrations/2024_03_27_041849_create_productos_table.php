<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            
            $table->integer('cod')->unique();
            $table->string('nombre');
            $table->string('stock_minimo');
            $table->string('stock_maximo');
            $table->date('fecha_vencimiento');
            $table->integer('costo');
            $table->integer('cod_tipo');
            $table->string('ubicacion');
            $table->integer('cod_umedida');
            $table->integer('precio_venta');
            $table->integer('existencia');
            $table->integer('iva');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
