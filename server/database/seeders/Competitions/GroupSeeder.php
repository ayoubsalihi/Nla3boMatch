<?php

namespace Database\Seeders\Competitions;

use App\Models\Competitions\Group;
use Database\Factories\Competitions\GroupFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory()->count(10)->create();
    }
}
