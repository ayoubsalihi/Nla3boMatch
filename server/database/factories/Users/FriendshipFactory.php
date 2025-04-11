<?php

namespace Database\Factories\Users;

use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friendship>
 */
class FriendshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "status" => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            "sender_id" => User::inRandomOrder()->first()->id ? : User::factory()->create()->id,
            "reciever_id" => User::inRandomOrder()->first()->id ? : User::factory()->create()->id,
        ];
    }
}
