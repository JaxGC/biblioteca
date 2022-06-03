<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('matricula');
            $table->string('Nombre_completo');
            $table->string('Direccion');
            $table->string('Password');
            $table->foreignId('id_status_usuario')->constrained('status_usuarios');
            $table->foreignId('id_licenciatura')->constrained('licenciaturas');
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
        Schema::dropIfExists('alumnos');
    }
};
