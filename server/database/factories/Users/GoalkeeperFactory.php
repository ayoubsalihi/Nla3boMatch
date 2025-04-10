<?php

namespace Database\Factories\Users;

use App\Models\Users\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goalkeeper>
 */
class GoalkeeperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "diving" => $this->faker->numberBetween(50, 99),
            "reflex" => $this->faker->numberBetween(50, 99),
            "kicking" => $this->faker->numberBetween(50, 99),
            "handling" => $this->faker->numberBetween(50, 99),
            "positionning" => $this->faker->numberBetween(50, 99),
            "speed" => $this->faker->numberBetween(50, 99),
            "player_id" => Player::inRandomOrder()->first()->id ? Player::factory()->create()->id : null,
        ];
    }
}
