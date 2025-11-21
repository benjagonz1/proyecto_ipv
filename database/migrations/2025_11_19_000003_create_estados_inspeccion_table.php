<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstadosInspeccionTable extends Migration
{
    public function up()
    {
        Schema::create('estados_inspeccion', function (Blueprint $table) {
            $table->increments('id_estado');
            $table->string('descripcion', 50);
            $table->string('color', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados_inspeccion');
    }
}
