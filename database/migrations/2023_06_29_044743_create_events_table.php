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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_type_event')
                  ->nullable()
                  ->constrained('type_events')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_space')
                  ->nullable()
                  ->constrained('spaces')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
             $table->foreignId('service_id')
                  ->nullable()
                  ->constrained('services')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->string('name');
            $table->dateTime('date')->nullable();
            $table->integer('price')->nullable();
            $table->integer('amount')->nullable();
            $table->string('avatar')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
