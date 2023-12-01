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
        Schema::create('accessory_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('accesory_id');
            $table->string('images');
            $table->foreign('accesory_id')->references('id')->on('accessory')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accessory_images');
    }
};
