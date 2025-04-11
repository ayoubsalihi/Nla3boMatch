<?php

namespace Database\Factories;

use App\Models\Teams\TeamChat;
use App\Models\Users\Chat;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "message" => $this->faker->sentence(),
            "chat_id" => Chat::factory()->create()->id,
            "sender_id" => User::factory()->create()->id,
            "team_chat_id" => TeamChat::factory()->create()->id,
        ];
    }
}
