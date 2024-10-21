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
        Schema::create('podcasts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('title');
            $table->string('generator')->nullable();
            $table->text('description')->nullable();
            $table->string('author');
            $table->string('copyright')->nullable();
            $table->string('language');
            $table->string('external_url');
            $table->string('feed_url');
            $table->json('image')->nullable();
            $table->json('owner')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('podcasts');
    }
};
