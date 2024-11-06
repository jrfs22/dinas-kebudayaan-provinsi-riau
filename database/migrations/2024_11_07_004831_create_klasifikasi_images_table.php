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
        Schema::create('klasifikasi_images', function (Blueprint $table) {
            $table->id();
            $table->text('image_path');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->timestamps();

            $table->foreign('klasifikasi_id')->references('id')->on('klasifikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasi_images');
    }
};
