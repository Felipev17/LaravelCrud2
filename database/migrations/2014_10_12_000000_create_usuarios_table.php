<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->string('documento')->unique();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('Telefono')->unique();
            $table->string('Rol');
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
