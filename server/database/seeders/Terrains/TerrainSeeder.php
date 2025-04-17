<?php

namespace Database\Seeders\Terrains;

use Database\Factories\Terrains\TerrainFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerrainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TerrainFactory::create()->count(10);
    }
}
