<?php

namespace Database\Seeders\Terrains;

use Database\Factories\Terrains\AcademyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademyFactory::create()->count(10);
    }
}
