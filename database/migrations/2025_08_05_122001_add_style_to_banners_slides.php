<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Lunar\Base\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('style', 50)->default('positive')->after('type');
        });

        Schema::table('slides', function (Blueprint $table) {
            $table->string('style', 50)->default('positive')->after('section');
        });
    }

    public function down(): void
    {
        Schema::table('slides', function (Blueprint $table) {
            $table->dropColumn('style');
        });

        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('style');
        });
    }
};
