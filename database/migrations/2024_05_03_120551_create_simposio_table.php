<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('simposios', function (Blueprint $table) {
            $table->id();
            $table->string('tema', 250);
            $table->decimal('costo', 10, 2);
            $table->timestamps();
        });

        // Inserción de datos
        DB::table('simposios')->insert([
            'id' => 1,
            'tema' => 'Simposio',
            'costo' => 0.0
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('simposios');
    }
};
