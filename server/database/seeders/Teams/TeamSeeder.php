<?php

namespace Database\Seeders\Teams;

use App\Models\Teams\Team;
use Database\Factories\Teams\TeamFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Team::factory()->count(10)->create();
    }
}
