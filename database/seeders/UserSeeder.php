<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moderatorUser = User::create([
            "name" => "Dearo Moderator",
            "email" => "moderator@dearoinvestment.com",
            "mobile" => "0702896932",
            "password" => bcrypt("FinTechMod"),
        ]);

        $moderatorUser->assignRole('moderator');  

        // $branchManager = User::create([
        //     "name" => "Sineth Kushal",
        //     "email" => "sineth@dearoinvestment.com",
        //     "mobile" => "0712223333",
        //     "password" => bcrypt("FinTechManage"),
        // ]);

        // $branchManager->assignRole('branch-manager');  
        
        $superAdmin = User::create([
            "name" => "Dearo Super Admin",
            "email" => "admin@dearoinvestment.com",
            "mobile" => "0743908274",
            "password" => bcrypt("FinTechAdm"),
        ]);

        $superAdmin->assignRole('super-admin');  
    }
}
