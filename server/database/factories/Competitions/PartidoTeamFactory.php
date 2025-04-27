<?php

namespace Database\Factories\Competitions;

use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compete>
 */
class PartidoTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "match_id" => Partido::inRandomOrder()->first()->id ?? Partido::factory()->create()->id,
            "team_id" => Team::inRandomOrder()->first()->team1_id ?? Team::factory()->create()->team1_id,
        ];
    }
}
