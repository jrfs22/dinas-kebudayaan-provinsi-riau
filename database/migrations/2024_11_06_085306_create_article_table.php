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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->text('title');
            $table->text('content');
            $table->string('summary');
            $table->text('slug');
            $table->date('date');
            $table->text('cover_image_path');
            $table->text('image_path');
            $table->unsignedBigInteger('category_id');
            $table->json('hashtags');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('article_categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
