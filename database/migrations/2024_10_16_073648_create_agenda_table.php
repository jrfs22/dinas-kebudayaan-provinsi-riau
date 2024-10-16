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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('location');
            $table->text('image_path')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('agenda_category_id');
            $table->timestamps();

            $table->foreign('agenda_category_id')->references('id')->on('agenda_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
