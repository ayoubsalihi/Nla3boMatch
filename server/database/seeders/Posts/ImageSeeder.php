<?php

namespace Database\Seeders\Posts;

use App\Models\Posts\Image;
use Database\Factories\Posts\ImageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Image::factory()->count(10)->create();
    }
}
