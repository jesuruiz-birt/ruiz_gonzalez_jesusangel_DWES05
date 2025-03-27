<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('canciones', function (Blueprint $table) {
            $table->id('id_cancion');
            $table->string('nombre');
            $table->integer('anio_lanzamiento')->nullable();
            $table->string('genero')->nullable();
            $table->unsignedBigInteger('id_artista');
            $table->timestamps();

            $table->foreign('id_artista')->references('id_artista')->on('artistas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canciones');
    }
};
