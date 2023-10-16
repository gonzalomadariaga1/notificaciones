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
        Schema::create('proyectos_notificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('estado')->default('Borrador');
            $table->tinyInteger('leido')->default('0');
            $table->tinyInteger('importancia')->default('0');
            $table->datetime('fecha_lectura')->nullable();
            $table->foreignId('proyecto_id')->references('id')->on('proyectos')->nullable();
            $table->foreignId('notificacion_id')->references('id')->on('notificaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos_notificaciones');
    }
};
