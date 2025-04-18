<?php

namespace Database\Factories\Terrains;

use App\Models\Teams\Team;
use App\Models\Terrains\Academy;
use App\Models\Terrains\Terrain;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reservableTypes = [
            Team::class,
            Academy::class,
        ];
        $reservableType = $this->faker->randomElement($reservableTypes);
        $reservable = $reservableType::inRandomOrder()->first() ?? $reservableType::factory()->create();

        $start = Carbon::now()->addDays(rand(1, 30))->setTime(rand(8, 20), [0, 30][rand(0, 1)]);
        $end = (clone $start)->addHours(1);
        return [
            'terrain_id' => Terrain::inRandomOrder()->first()?->id ?? Terrain::factory()->create()->id,
            'reservable_type' => $reservableType,
            'reservable_id' => $reservable->id,
            'start_time' => $start,
            'end_time' => $end,
            'status' => $this->faker->randomElement(['en attente', 'confirmé', 'abandonnée']),
        ];
    }
}
