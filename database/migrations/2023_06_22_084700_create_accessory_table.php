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
        Schema::create('accessory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gearCategory_id');
            $table->string('accessory_name');
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
            $table->foreign('gearCategory_id')->references('id')->on('accessory_category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('accessory');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
