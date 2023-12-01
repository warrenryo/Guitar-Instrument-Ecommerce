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
        Schema::create('string_gauge', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('string_id');
            $table->string('string_gauge')->nullable();
            $table->foreign('string_id')->references('id')->on('string')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('string_gauge');
    }
};
