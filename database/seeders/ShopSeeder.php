<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            ['name' => '高級メロンパン屋', 'area_id' => 1],
            ['name' => '高級クロワッサン', 'area_id' => 2],
            ['name' => '高級アンパン屋', 'area_id' => 1],
            ['name' => '高級フランスパン屋', 'area_id' => 3],
        ]);
    }
}
