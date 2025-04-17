<?php

namespace Database\Seeders\Posts;

use Database\Factories\Posts\VideoFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VideoFactory::create()->count(10);
    }
}
