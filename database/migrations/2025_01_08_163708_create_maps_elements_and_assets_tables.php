<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMapsElementsAndAssetsTables extends Migration
{
    /**
     * Ejecuta la migración.
     */
    public function up(): void
    {
        // Tabla de mapas
        Schema::create('maps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('theme')->default('Unknown');
            $table->timestamps();
        });

        // Tabla de elementos del mapa
        Schema::create('map_elements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->text('description')->nullable();
            $table->foreignId('map_id')
                  ->constrained('maps')
                  ->onDelete('cascade');  // Si se elimina un mapa, se eliminan sus elementos
            $table->string('size')->default('medium');
            $table->integer('position_x')->default(0);
            $table->integer('position_y')->default(0);
            $table->timestamps();
        });

        // Nueva tabla de assets (recursos gráficos)
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');  // textura, modelo 3D, sonido
            $table->string('path')->nullable();  // Ruta del archivo (puede ser nulo)
            $table->foreignId('element_id')
                  ->constrained('map_elements')
                  ->onDelete('cascade');  // Si se elimina un elemento, se eliminan sus assets
            $table->string('size')->default('small');  // Tamaño del asset
            $table->timestamps();
        });
    }

    /**
     * Revierte la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
        Schema::dropIfExists('map_elements');
        Schema::dropIfExists('maps');
    }
}