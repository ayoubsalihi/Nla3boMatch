<?php

namespace Database\Seeders\Users;

use Database\Factories\Users\PlayerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PlayerFactory::create()->count(10);
    }
}
