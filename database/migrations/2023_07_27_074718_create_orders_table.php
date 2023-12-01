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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('tracking_number');
            $table->integer('user_id')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('company')->nullable();
            $table->string('address');
            $table->string('apartment')->nullable();
            $table->integer('postalCode');
            $table->string('city');
            $table->string('phoneNumber')->nullable();
            $table->string('contactInfo');                                                                                                                                                                                                                                                                    
            $table->string('delivery_method');
            $table->string('payment_method');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('orders');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
};
