<?php

namespace Database\Seeders\Users;

use App\Models\Users\Goalkeeper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GoalkeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Goalkeeper::factory()->count(10)->create();
    }
}
