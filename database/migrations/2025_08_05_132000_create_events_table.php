<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_type_id')->constrained('event_types');

            $table->json('name');
            $table->json('subtitle')->nullable();
            $table->json('description')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->string('delivery_method', 20);
            $table->string('location')->nullable();

            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });

        Schema::create('event_'.config('lunar.database.table_prefix').'product', function (Blueprint $table) {
            $table->foreignId('event_id')->constrained('events')->cascadeOnDelete();
            $table
                ->foreignId('product_id')
                ->constrained(config('lunar.database.table_prefix').'products')
                ->cascadeOnDelete();
            $table->integer('position');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_'.config('lunar.database.table_prefix').'product');
        Schema::dropIfExists('events');
    }
};
