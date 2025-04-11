<?php

namespace Database\Factories\Terrains;

use App\Models\Terrains\Terrain;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Academy>
 */
class AcademyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name_academy" => $this->faker->name(),
            "reference" => $this->faker->unique()->word(),
            "responsable" => $this->faker->name(),
            "type_academy" => $this->faker->randomElement(["Academy", "School"]),
            "terrain_id" => Terrain::inrandomOrder()->first()->id ?? Terrain::factory()->create()->id,
        ];
    }
}
