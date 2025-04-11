<?php

namespace Database\Factories\Users;

use App\Models\Competitions\Partido;
use App\Models\Users\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participation>
 */
class ParticipationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // participation model refers to match_player associated table
        return [
            "match_id" => Partido::factory()->create()->id,
            "role_id" => Role::factory()->create()->id,
        ];
    }
}
