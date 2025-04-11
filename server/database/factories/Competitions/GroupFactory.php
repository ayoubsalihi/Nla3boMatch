<?php

namespace Database\Factories\Competitions;

use App\Models\Competitions\Competition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name_group" => $this->faker->randomElement(["A", "B", "C", "D", "E", "F", "G", "H"]),
            "competition_id" => Competition::inRandomOrder()->first()->id ?? Competition::factory()->create()->id,
        ];
    }
}
