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
        Schema::create('klasifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('klasifikasi_category_id');
            $table->string('title');
            $table->text('description');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('klasifikasi_category_id')->references('id')->on('klasifikasi_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi');
    }
};
