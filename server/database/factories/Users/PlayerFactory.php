<?php

namespace Database\Factories\Users;

use App\Models\Teams\Team;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "poste" => $this->faker->randomElement(["Attaquant", "Milieu", "Defenseur", "Gardien"]),
            "user_id" => User::factory()->create()->id,
            "team_id" => Team::factory()->create()->id,
        ];
    }
}
