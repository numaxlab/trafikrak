<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->json('name');
            $table->json('summary')->nullable();
            $table->json('content')->nullable();
            $table->string('image')->nullable();

            $table->dateTime('published_at');
            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });

        Schema::create('article_'.config('lunar.database.table_prefix').'product', function (Blueprint $table) {
            $table->foreignId('article_id')->constrained('articles')->cascadeOnDelete();
            $table
                ->foreignId('product_id')
                ->constrained(config('lunar.database.table_prefix').'products')
                ->cascadeOnDelete();
            $table->integer('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('article_'.config('lunar.database.table_prefix').'product');
        Schema::dropIfExists('articles');
    }
};
