<?php

namespace Database\Seeders\Users;

use Database\Factories\Users\GoalkeeperFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalkeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GoalkeeperFactory::create()->count(10);
    }
}
