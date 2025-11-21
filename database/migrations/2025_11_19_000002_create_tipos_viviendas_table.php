<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposViviendasTable extends Migration
{
    public function up()
    {
        Schema::create('tipos_viviendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tipos_viviendas');
    }
}
