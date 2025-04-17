<?php

namespace Database\Seeders\Users;

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
        FriendshipFactory::create()->count(10);
    }
}
