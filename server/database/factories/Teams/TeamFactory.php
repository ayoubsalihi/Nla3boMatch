<?php

namespace Database\Factories\Teams;

use App\Models\Competitions\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "inititule_team" => $this->faker->word(),
            "type_team" => $this->faker->word(),
            "size_team" => $this->faker->word(),
            "responsable" => $this->faker->word(),
            "competition_id" => Competition::inRandomOrder()->first()->id ?? Competition::factory()->create()->id,
        ];
    }
}
