<?php

namespace Database\Seeders\Teams;

use App\Models\Teams\TeamChat;
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
        TeamChat::factory()->count(10)->create();
    }
}
