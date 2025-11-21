<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->string('nombrecompleto', 255);
            $table->string('email', 100)->unique();
            $table->string('password', 255);
            $table->integer('rol_id')->unsigned()->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->integer('activo')->default(1);

            $table->foreign('rol_id')->references('id')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
