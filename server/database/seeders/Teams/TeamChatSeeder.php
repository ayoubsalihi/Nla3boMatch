<?php

namespace Database\Seeders\Teams;

use Database\Factories\Teams\TeamChatFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamChatFactory::create()->count(10);
    }
}
