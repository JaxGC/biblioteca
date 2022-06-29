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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_limite')->nullable();
            $table->string('documento');
            $table->foreignId('id_libro')->constrained('libros');
            $table->string('estadolibro')->nullable();
            $table->integer('observaciones')->nullable();
            $table->integer('id_administrador');
            $table->integer('id_alumno');
            $table->integer('estado_prestamo')->nullable();
            $table->integer('devolucion')->nullable();
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
        Schema::dropIfExists('prestamos');
    }
};
