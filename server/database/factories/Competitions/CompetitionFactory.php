<?php

namespace Database\Factories\Competitions;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "intitule_competition" => $this->faker->randomElement(["Ligue 1", "Premier League", "La Liga", "Serie A", "Bundesliga"]),
            "type_competition" => $this->faker->randomElement(["league", "cup"]),
            "date_debut" => $this->faker->date(),
            "date_fin" => $this->faker->date(),
        ];
    }
}
