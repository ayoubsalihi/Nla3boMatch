<?php

namespace Database\Factories\Teams;

use App\Models\Competitions\Group;
use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupTeam>
 */
class GroupTeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            "points" => $this->faker->numberBetween(0,9),
            "GF" => $this->faker->numberBetween(0,9),
            "GA" => $this->faker->numberBetween(0,9),
            "GD" => $this->faker->numberBetween(0,9),
            "team_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id ,
            "group_id" => Group::inRandomOrder()->first()->id ?? Group::factory()->create()->id,
        ];
    }
}
