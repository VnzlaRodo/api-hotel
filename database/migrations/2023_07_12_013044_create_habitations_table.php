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
        Schema::create('habitations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_type_habitation')
                  ->nullable()
                  ->constrained('type_habitations')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_lodging')
                  ->nullable()
                  ->constrained('lodgings')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->integer('number')->unique();
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->string('description')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitations');
    }
};
