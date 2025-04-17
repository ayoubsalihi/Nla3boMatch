<?php

namespace Database\Seeders;

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
        ImageFactory::create()->count(10);
    }
}
