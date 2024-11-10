<?php

namespace Database\Seeders;

use App\Models\Companyinformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class companyinformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Companyinformation::create([

            "companyname"=> "Flipkart",
            "companyLogo"=> "assets/img/companyinfo/default.png",
            "customerCareNo"=> "+91 9065608408",
            "helpLineNo"=> "+91 8809835319",
            "copyRight"=> "2024-2030",
            "appVersion"=> "version 3.2.1v",
            "facebookLinks"=> "https://www.youtube.com/",
            "linkedinLinks"=> "https://www.youtube.com/",
            "tutreLinks"=> "https://www.youtube.com/",
            "whatsaapLinks"=> "https://www.youtube.com/",
            "companyAddress"=> "Nathnagar karela 8132206",
            "companyEmail"=> "souravrupani@gmail.com",
        ]);
    }
}
