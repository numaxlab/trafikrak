<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_modules', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->json('subtitle')->nullable();
            $table->json('description')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->string('delivery_method', 20);
            $table->string('location')->nullable();
            $table->boolean('is_published')->default(false);

            $table->foreignId('course_id')->constrained('courses')->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::create('course_module_'.config('lunar.database.table_prefix').'product', function (Blueprint $table) {
            $table->foreignId('course_module_id')->constrained('course_modules')->cascadeOnDelete();
            $table
                ->foreignId('product_id')
                ->constrained(config('lunar.database.table_prefix').'products')
                ->cascadeOnDelete();
            $table->integer('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_module_'.config('lunar.database.table_prefix').'product');
        Schema::dropIfExists('course_modules');
    }
};
