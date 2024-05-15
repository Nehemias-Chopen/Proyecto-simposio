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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('no_boleta');
            $table->string('estudiante', 15);
            $table->decimal('total', 10, 2);
            $table->string('estado', 100);
            $table->string('imagen', 300)->nullable();
            $table->timestamps();

            $table->foreign('estudiante')->references('carnet')->on('alumnos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inscripciones', function (Blueprint $table) {
            $table->dropForeign(['estudiante']);
        });
        Schema::dropIfExists('inscripciones');
    }
};