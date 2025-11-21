<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotivosInspeccionTable extends Migration
{
    public function up()
    {
        Schema::create('motivos_inspeccion', function (Blueprint $table) {
            $table->increments('id_motivo');
            $table->string('descripcion', 200);
            $table->integer('activo')->default(1);
        });
    }

    public function down()
    {
        Schema::dropIfExists('motivos_inspeccion');
    }
}
