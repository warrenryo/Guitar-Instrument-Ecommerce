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
        Schema::create('guitar_effects_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guitar_effects_id');
            $table->string('images');
            $table->foreign('guitar_effects_id')->references('id')->on('guitar_effects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guitar_effects_images');
    }
};
