<?php

namespace Database\Seeders\Competitions;

use App\Models\Competitions\Competition;
use Database\Factories\Competitions\CompetitionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::factory()->count(10)->create();
    }
}
