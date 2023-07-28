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
        Schema::create('lodgings', function (Blueprint $table) {
            $table->id();           
            $table->foreignId('id_client')
                  ->nullable()
                  ->constrained('clients')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_user')
                  ->nullable()
                  ->constrained('users')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
             $table->foreignId('service_id')
                  ->nullable()
                  ->constrained('services')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->dateTime('checkin');
            $table->dateTime('checkout');
            $table->integer('adults')->nullable();
            $table->integer('children')->nullable();
            $table->integer('price')->nullable();
            $table->string('status', 20)->default('pendiente');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lodgings');
    }
};
