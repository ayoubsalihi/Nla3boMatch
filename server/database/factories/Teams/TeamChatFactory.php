<?php

namespace Database\Factories\Teams;

use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamChat>
 */
class TeamChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "team_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
        ];
    }
}
