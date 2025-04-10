<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chat>
 */
class ChatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user1_id" => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            "user2_id" => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
        ];
    }
}
