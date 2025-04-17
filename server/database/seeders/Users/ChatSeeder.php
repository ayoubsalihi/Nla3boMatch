<?php

namespace Database\Seeders\Users;

use App\Models\Users\Chat;
use Database\Factories\Users\ChatFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::factory()->count(10)->create();
    }
}
