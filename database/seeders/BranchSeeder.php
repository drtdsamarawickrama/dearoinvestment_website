<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\BranchDistrict;
use App\Models\BranchManager;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $branch = Branch::create([
        //     'id' => 1, 
        //     'branch_name' => 'DehiaththaKandiya'
        // ]);

        // BranchDistrict::create([
        //     'branch_id' => $branch->id,
        //     'district_id' => 1,
        // ]);

        // BranchDistrict::create([
        //     'branch_id' => $branch->id,
        //     'district_id' => 2,
        // ]);

        // $manager = User::where('email', 'sineth@dearoinvestment.com')->first();
        // BranchManager::create([
        //     'manager_name' => $manager->name,
        //     'branch_id' => $branch->id,
        //     'user_id' => $manager->id,
        // ]);
    }
}
