<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_materials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('training_id')->constrained()->onDelete('cascade');
            $table->string('material_name'); // Title of the material
            $table->text('description')->nullable(); // Description of the material
            $table->enum('material_type', ['video', 'text', 'quiz']); // Restrict to valid types
            $table->text('material_content')->nullable(); // For text content or JSON quiz data
            $table->string('material_url')->nullable(); // For videos
            $table->integer('duration')->nullable(); // Store duration in seconds for videos
            $table->json('quiz_data')->nullable(); // Store quizzes in JSON format
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_materials');
    }
};
