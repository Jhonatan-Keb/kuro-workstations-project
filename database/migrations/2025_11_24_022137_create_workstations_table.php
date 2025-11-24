<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workstations', function (Blueprint $table) {
            $table->id();
            
            // Relación con User (Dueño)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Hardware Specs
            $table->string('name');
            $table->string('cpu');
            $table->integer('ram'); // GB
            $table->string('gpu');
            $table->string('os')->default('Artix Linux');
            
            // Estado del pedido
            $table->enum('status', ['pending', 'building', 'shipped', 'cancelled'])->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workstations');
    }
};