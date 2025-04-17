<?php

namespace Database\Seeders\Posts;

use Database\Factories\Posts\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostFactory::create()->count(10);
    }
}
