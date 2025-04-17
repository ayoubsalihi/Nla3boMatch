<?php

namespace Database\Seeders\Users;

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
        ChatFactory::create()->count(10);
    }
}
