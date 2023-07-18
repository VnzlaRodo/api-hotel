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
        Schema::create('users', function (Blueprint $table) {
            $table->id();   
            $table->foreignId('id_role')
                  ->nullable()
                  ->constrained('roles')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();   
            $table->foreignId('id_worker')
                  ->nullable()
                  ->constrained('workers')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();       
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birthdate')->nullable();            
            $table->string('password');
            $table->string('question1')->nullable();
            $table->string('answer1')->nullable();
            $table->string('question2')->nullable();
            $table->string('answer2')->nullable();
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
