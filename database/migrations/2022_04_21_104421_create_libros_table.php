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
            $table->string('Nombre_libro');
            $table->foreignId('id_autor')->constrained('autores');
            $table->foreignId('id_editorial')->constrained('editoriales');
            $table->year('year_edicion');
            $table->timestamp('fecha_publicacion');
            $table->foreignId('id_categoria')->constrained('categorias');
            $table->bigInteger('ejemplares');
            $table->bigInteger('libros_prestados');
            $table->string('estado');
            $table->text('observaciones');
            $table->string('imagen');
            $table->integer('numero_stand')->nullable();
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
