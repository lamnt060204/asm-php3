<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $data = [];
     for($i = 1; $i < 10; $i ++) {
        $data[] = [
            "name" =>fake()->name,
            "status"=>fake()->numberBetween(0,1),
        ];
        DB::table("categories")->insert($data);
     }   
    }
}
