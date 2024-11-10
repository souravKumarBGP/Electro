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
        Schema::create('parentcategories', function (Blueprint $table) {
            $table->id("categoryId");
            $table->string("categoryName")->unique();
            $table->longText("discreption");
            $table->string("picture");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parentcategories');
    }
};
