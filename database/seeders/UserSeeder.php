<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                "name"=> "Sourav Rupani",
                "email"=> "souravrupani@gmail.com",
                "password"=> Hash::make("souravrupani"),
                "gender"=> "male",
                "role"=> "admin",
                "created_at"=> now(),
                "updated_at"=> now()
            ],
            [
                "name"=> "Sourav kumar",
                "email"=> "souravkumar@gmail.com",
                "password"=> Hash::make("souravkumar"),
                "gender"=> "male",
                "role"=> "customer",
                "created_at"=> now(),
                "updated_at"=> now()
            ]
        ]);
    }
}
