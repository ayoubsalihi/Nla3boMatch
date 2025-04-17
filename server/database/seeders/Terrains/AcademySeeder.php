<?php

namespace Database\Seeders\Terrains;

use App\Models\Terrains\Academy;
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
        Academy::factory()->count(10)->create();
    }
}
