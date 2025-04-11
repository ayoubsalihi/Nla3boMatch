<?php

namespace Database\Factories\Competitions;

use App\Models\Competitions\Competition;
use App\Models\Competitions\Partido;
use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Knockout>
 */
class KnockoutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "round" => $this->faker->randomElement(["quarter", "semi", "final"]),
            "team1_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
            "team2_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
            "winner_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
            "match_id" =>Partido::inRandomOrder()->first()->id ?? Partido::factory()->create()->id,
            "competition_id" => Competition::inRandomOrder()->first()->id ?? Competition::factory()->create()->id,
        ];
    }
}
