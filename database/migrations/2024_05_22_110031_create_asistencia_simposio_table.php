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
        Schema::create('asistencia_simposios', function (Blueprint $table) {
            $table->id();
            $table->string('carnet', 100);
            $table->string('nombre', 250);
            $table->unsignedBigInteger('no_boleta');
            $table->string('pdf')->nullable();
            $table->timestamps();

            // Claves foráneas
            $table->foreign('carnet')->references('carnet')->on('alumnos')->onDelete('cascade');
            $table->foreign('no_boleta')->references('no_boleta')->on('inscripciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asistencia_simposios', function (Blueprint $table) {
            $table->dropForeign(['carnet']);
            $table->dropForeign(['no_boleta']);
        });
        Schema::dropIfExists('asistencia_simposios');
    }
};