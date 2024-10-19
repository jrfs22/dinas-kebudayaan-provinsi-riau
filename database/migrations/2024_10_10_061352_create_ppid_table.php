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
        Schema::create('ppid', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('content')->nullable();
            $table->text('image_path')->nullable();
            $table->string('responsible_person')->nullable();
            $table->year('year_of_publication')->nullable();
            $table->string('information_format')->nullable();
            $table->string('storage_duration')->nullable();
            $table->unsignedBigInteger('ppid_category_id');
            $table->timestamps();

            $table->foreign('ppid_category_id')->references('id')->on('ppid_category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppid');
    }
};
