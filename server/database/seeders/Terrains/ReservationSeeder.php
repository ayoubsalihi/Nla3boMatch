<?php

namespace Database\Seeders\Terrains;

use App\Models\Terrains\Reservation;
use Database\Factories\Terrains\ReservationFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::factory()->count(10)->create();
    }
}
