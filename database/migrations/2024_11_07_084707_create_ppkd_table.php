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
        Schema::create('ppkd', function (Blueprint $table) {
            $table->id();
            $table->string('province_id');
            $table->string('province_name');
            $table->string('regency_id');
            $table->string('regency_name');
            $table->string('title');
            $table->text('file_path');
            $table->enum('status', [
                'disusun', 'disahkan'
            ]);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppkd');
    }
};
