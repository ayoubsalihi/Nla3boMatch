<?php

namespace Database\Seeders\Competitions;

use App\Models\Competitions\Partido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partido::factory()->count(10)->create();
    }
}
