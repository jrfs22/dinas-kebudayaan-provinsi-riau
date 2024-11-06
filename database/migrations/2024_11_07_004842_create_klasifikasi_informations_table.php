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
        Schema::create('klasifikasi_informations', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('description');
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
        Schema::dropIfExists('klasifikasi_informations');
    }
};
