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
        Schema::create('products', function (Blueprint $table) {
            $table->id('productId');
            $table->string('productName');
            $table->string("slug")->unique();
            $table->string("sku")->unique();
            $table->longText('productDiscreption');
            $table->string('unite');
            $table->string('brandName');
            $table->string("categoryName");
            $table->string("childCategoryName");
            $table->string('mrp');
            $table->string('sellPrice');
            $table->string('abalibleQuantity');
            $table->string('productThemainal');
            $table->string('generalImage');

            // Foreign key constraints
            $table->foreign('brandName')->references('name')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categoryName')->references('categoryName')->on('parentcategories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('childCategoryName')->references('childCategoryName')->on('childcategories')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
