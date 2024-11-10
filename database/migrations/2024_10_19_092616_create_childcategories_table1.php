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
        Schema::create('childcategories', function (Blueprint $table) {
            $table->id();
            $table->string("childCategoryName")->unique();
            $table->string("categoryImage");
            $table->longText("discreption");
            $table->string("categoryName");

            // Create relationship between parentCategory and childCategory
            $table->foreign("categoryName")->references("categoryName")->on("parentcategories")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('childcategories');
    }
};
