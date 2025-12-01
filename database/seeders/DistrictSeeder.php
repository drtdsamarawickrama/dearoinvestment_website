<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        District::create(["id" => 1, "district_name" => "Ampara"]);
        District::create(["id" => 2, "district_name" => "Anuradhapura"]);
        District::create(["id" => 3, "district_name" => "Badulla"]);
        District::create(["id" => 4, "district_name" => "Batticaloa"]);
        District::create(["id" => 5, "district_name" => "Colombo"]);

        District::create(["id" => 6, "district_name" => "Galle"]);
        District::create(["id" => 7, "district_name" => "Gampaha"]);
        District::create(["id" => 8, "district_name" => "Hambantota"]);
        District::create(["id" => 9, "district_name" => "Jaffna"]);
        District::create(["id" => 10, "district_name" => "Kalutara"]);

        District::create(["id" => 11, "district_name" => "Kandy"]);
        District::create(["id" => 12, "district_name" => "Kegalle"]);
        District::create(["id" => 13, "district_name" => "Kilinochchi"]);
        District::create(["id" => 14, "district_name" => "Kurunegala"]);
        District::create(["id" => 15, "district_name" => "Mannar"]);

        District::create(["id" => 16, "district_name" => "Matale"]);
        District::create(["id" => 17, "district_name" => "Matara"]);
        District::create(["id" => 18, "district_name" => "Moneragala"]);
        District::create(["id" => 19, "district_name" => "Mullaitivu"]);
        District::create(["id" => 20, "district_name" => "Nuwara Eliya"]);

        District::create(["id" => 21, "district_name" => "Polonnaruwa"]);
        District::create(["id" => 22, "district_name" => "Puttalam"]);
        District::create(["id" => 23, "district_name" => "Ratnapura"]);
        District::create(["id" => 24, "district_name" => "Trincomalee"]);
        District::create(["id" => 25, "district_name" => "Vavuniya"]);
    }
}
