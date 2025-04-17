<?php

namespace Database\Seeders\Users;

use App\Models\Users\Friendship;
use Database\Factories\Users\FriendshipFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FriendshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Friendship::factory()->count(10)->create();
    }
}
