<?php

namespace Database\Factories\Teams;


use App\Models\Terrains\Terrain;
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
            "intitule_team" => $this->faker->word(),
            "type_team" => $this->faker->word(),
            "size_team" => $this->faker->word(),
            "responsable" => $this->faker->word(),
            "terrain_id" => Terrain::inRandomOrder()->first()->id ?? Terrain::factory()->create()->id,
            
        ];
    }
}
