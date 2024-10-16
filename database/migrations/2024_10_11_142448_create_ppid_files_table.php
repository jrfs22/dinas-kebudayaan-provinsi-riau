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
        Schema::create('ppid_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->text('file_path');
            $table->text('file_number');
            $table->unsignedBigInteger('ppid_id');
            $table->date('release_date')->nullable();
            $table->timestamps();

            $table->foreign('ppid_id')->references('id')->on('ppid')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppid_files');
    }
};
