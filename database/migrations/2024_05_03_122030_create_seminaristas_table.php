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
        Schema::create('seminaristas', function (Blueprint $table) {
            $table->id('id_seminarista');
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('tema', 250);
            $table->string('telefono', 15);
            $table->decimal('viaticos', 10, 2);
            $table->text('hoja_vida');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seminaristas');
    }
};