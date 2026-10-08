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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('title');
            $table->text('description');
            $table->text('synopsis')->nullable();
            $table->string('image')->nullable();
            $table->string('preview')->nullable();
            $table->foreignId('tutor_id');
            $table->foreignId('user_id')->nullable();
            $table->enum('level', ['Scratch', 'Beginner', 'Intermediate', 'Advanced'])->default('Beginner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
