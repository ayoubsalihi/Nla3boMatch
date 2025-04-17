<?php

namespace Database\Seeders\Users;

use Database\Factories\Users\InsidePlayerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InsidePlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InsidePlayerFactory::create()->count(10);
    }
}
