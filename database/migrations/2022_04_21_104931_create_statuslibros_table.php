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
        Schema::create('statuslibros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_status_libro')->constrained('libros');
            $table->integer('Num_exitentes');
            $table->integer('Prestados');
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
        Schema::dropIfExists('statuslibros');
    }
};
