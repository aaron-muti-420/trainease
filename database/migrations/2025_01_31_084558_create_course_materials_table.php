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
            $table->string('material_type'); // Type of the material (Video, Text, Quiz)
            $table->text('material_content')->nullable(); // Store JSON or text content
            $table->string('material_url')->nullable();
            $table->string('duration')->nullable(); // Duration for video materials
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
