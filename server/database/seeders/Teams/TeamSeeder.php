<?php

namespace Database\Seeders\Teams;

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
        TeamFactory::create()->count(10);
    }
}
