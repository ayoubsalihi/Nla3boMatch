<?php

namespace Database\Seeders\Users;

use Database\Factories\Users\MessageFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageFactory::create()->count(10);
    }
}
