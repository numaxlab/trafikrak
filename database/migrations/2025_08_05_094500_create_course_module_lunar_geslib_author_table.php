<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create(
            'course_module_'.config('lunar.database.table_prefix').'geslib_author',
            function (Blueprint $table) {
                $table
                    ->foreignId('course_module_id')
                    ->constrained('course_modules')
                    ->cascadeOnDelete();
                $table
                    ->foreignId('author_id')
                    ->constrained(config('lunar.database.table_prefix').'geslib_authors')
                    ->cascadeOnDelete();
                $table->integer('position')->default(0);
            },
        );
    }

    public function down(): void
    {
        Schema::dropIfExists('course_module_'.config('lunar.database.table_prefix').'geslib_author');
    }
};
