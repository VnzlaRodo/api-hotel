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
        Schema::create('message_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_service');
            $table->string('name_service');            
            $table->string('email');
            $table->string('phone');
            $table->string('reason')->nullable();
            $table->string('details');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message_services');
    }
};
