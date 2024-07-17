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
        Schema::table('detail_new', function (Blueprint $table) {
            $table->foreignId('new_id')->constrained('news');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_new', function (Blueprint $table) {
            $table->dropForeign('detail_news_id_foreign');
        });
    }
};
