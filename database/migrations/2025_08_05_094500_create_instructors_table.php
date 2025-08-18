<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->json('description')->nullable();

            $table->timestamps();
        });

        Schema::create('course_module_instructor', function (Blueprint $table) {
            $table->foreignId('course_module_id')->constrained('course_modules')->cascadeOnDelete();
            $table->foreignId('instructor_id')->constrained('instructors')->cascadeOnDelete();
            $table->integer('position')->default(0);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_module_instructor');
        Schema::dropIfExists('instructors');
    }
};
