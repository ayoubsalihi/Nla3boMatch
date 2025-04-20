<?php

namespace Database\Factories\Competitions;

use App\Models\Competitions\Competition;
use App\Models\Teams\Team;
use App\Models\Terrains\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partido>
 */
class PartidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type_match" => $this->faker->randomElement(["friendly", "league", "cup"]),
            "level_match" => $this->faker->randomElement(["amateur", "professional"]),
            "result" => "2-1",
            "round" => $this->faker->randomElement(["group_stage","1/4","1/2","final"]),
            "competition_id" => Competition::inRandomOrder()->first()->id ?? Competition::factory()->create()->id,
            "team1_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
            "team2_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
            "terrain_id" => Terrain::inRandomOrder()->first()->id ?? Terrain::factory()->create()->id,
        ];
    }
}
