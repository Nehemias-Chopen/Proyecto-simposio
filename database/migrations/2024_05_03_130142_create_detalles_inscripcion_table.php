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
        Schema::create('detalles_inscripcion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('no_boleta');
            $table->unsignedBigInteger('suvenir');
            $table->text('Detalle')->nullable();
            $table->timestamps();

            $table->foreign('no_boleta')->references('no_boleta')->on('inscripciones');
            $table->foreign('suvenir')->references('codigo')->on('suvenires');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalles_inscripcion', function (Blueprint $table) {
            $table->dropForeign(['no_boleta']);
            $table->dropForeign(['suvenir']);
        });
        Schema::dropIfExists('detalles_inscripcion');
    }
};