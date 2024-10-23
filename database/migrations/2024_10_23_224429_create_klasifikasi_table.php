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
            $table->string('name');
            $table->text('image_path');
            $table->enum('jenis', [
                'benda', 'dokumen', 'prasasti'
            ]);
            $table->integer('total');
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
