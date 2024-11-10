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
        Schema::create('companyinformations', function (Blueprint $table) {
            $table->id();
            $table->string("companyName")->default("Flipkart");
            $table->string("companyLogo")->default("assets/img/companyinfo/default.png");
            $table->string("customerCareNo")->default("+91 8809835319");
            $table->string("helpLineNo")->default("+91 9065608408");
            $table->string("copyRight")->default(2024-3000);
            $table->string("appVersion")->default("1.0.0v");
            $table->string("facebookLinks")->default("https://www.youtube.com/");
            $table->string("linkedinLinks")->default("https://www.youtube.com/");
            $table->string("tutreLinks")->default("https://www.youtube.com/");
            $table->string("whatsaapLinks")->default("https://www.youtube.com/");
            $table->string("companyAddress")->default("Nathnagar Karela");
            $table->string("companyEmail")->default("souravrupani@gmail.com");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companyinformations');
    }
};
