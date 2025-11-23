<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeccionesTable extends Migration
{
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->increments('id_inspeccion');
            $table->integer('id_motivo')->unsigned();
            $table->string('codigo_vivienda', 50);
            $table->string('direccion', 255);
            $table->string('geolocalizacion', 255);
            $table->integer('tipo_vivienda_id')->unsigned()->nullable();
            $table->integer('estado_id')->unsigned()->nullable();
            $table->integer('usuario_id')->unsigned();
            $table->date('fecha_inspeccion')->nullable();
            $table->string('observaciones', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->index('tipo_vivienda_id');
            $table->index('estado_id');
            $table->index('usuario_id');
            $table->index('id_motivo');

            $table->foreign('tipo_vivienda_id')->references('id')->on('tipos_viviendas');
            $table->foreign('estado_id')->references('id_estado')->on('estados_inspeccion');
            $table->foreign('usuario_id')->references('id_usuario')->on('users');
            $table->foreign('id_motivo')->references('id_motivo')->on('motivos_inspeccion')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspecciones');
    }
}
