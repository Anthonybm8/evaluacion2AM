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
        Schema::create('circuitos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('pais');
            $table->string('nombre');
            $table->decimal('latitud1');
            $table->decimal('longitud1');
            $table->decimal('latitud2');
            $table->decimal('longitud2');
            $table->decimal('latitud3');
            $table->decimal('longitud3');
            $table->decimal('latitud4');
            $table->decimal('longitud4');
            $table->decimal('latitud5');
            $table->decimal('longitud5');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circuitos');
    }
};
