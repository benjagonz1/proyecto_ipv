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

            $table->unsignedInteger('id_motivo');
            $table->string('codigo_vivienda', 50);
            $table->string('direccion', 255);
            $table->string('geolocalizacion', 255);

            $table->unsignedInteger('tipo_vivienda_id')->nullable();
            $table->unsignedInteger('estado_id')->nullable();

            // IMPORTANTE: users.id = big integer unsigned
            $table->unsignedBigInteger('usuario_id');

            $table->date('fecha_inspeccion')->nullable();
            $table->string('observaciones', 255)->nullable();

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();

            $table->index('tipo_vivienda_id');
            $table->index('estado_id');
            $table->index('usuario_id');
            $table->index('id_motivo');

            // Relaciones corregidas
            $table->foreign('tipo_vivienda_id')->references('id')->on('tipos_viviendas');
            $table->foreign('estado_id')->references('id_estado')->on('estados_inspeccion');

            // ESTA ES LA RELACIÓN CORRECTA
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('id_motivo')->references('id_motivo')->on('motivos_inspeccion')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('inspecciones');
    }
}
