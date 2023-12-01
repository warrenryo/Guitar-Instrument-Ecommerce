<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('string', function (Blueprint $table) {
            $table->id();
            $table->string('stringCategory');
            $table->string('string_name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->integer('orig_price');
            $table->integer('quantity');
            $table->integer('sale_price')->nullable();
            $table->tinyInteger('trending')->default('0'); 
            $table->tinyInteger('status')->default('0');

            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('string');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
