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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->text('Nombre_libro');
            $table->string('id_autor',255)->nullable();
            $table->string('id_editorial',255)->nullable();
            $table->string('year_edicion')->nullable();
            $table->timestamp('fecha_publicacion');
            $table->string('id_categoria',255)->nullable();
            $table->bigInteger('ejemplares');
            $table->bigInteger('libros_prestados');
            $table->string('estado');
            $table->text('observaciones');
            $table->string('imagen');
            $table->string('numero_stand',255)->nullable();
            $table->string('codigo',255)->nullable();
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
        Schema::dropIfExists('libros');
    }
};
