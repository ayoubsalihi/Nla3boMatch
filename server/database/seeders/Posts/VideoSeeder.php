<?php

namespace Database\Seeders\Posts;

use App\Models\Posts\Video;
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
        Video::factory()->count(10)->create();
    }
}
