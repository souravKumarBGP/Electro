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
        Schema::create('productgallaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("productId");
            $table->string("gallaryImg");
            $table->foreign("productId")->references("productId")->on("products")->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productgallaries');
    }
};
