<?php

namespace Database\Factories\Users;

use App\Models\Users\Player;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InsidePlayer>
 */
class InsidePlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "pace" => $this->faker->numberBetween(50, 99),
            "dribbling" => $this->faker->numberBetween(50,99),
            "shooting" => $this->faker->numberBetween(50,99),
            "defending" => $this->faker->numberBetween(50,99),
            "passing" => $this->faker->numberBetween(50,99),
            "physical" => $this->faker->numberBetween(50,99),
            "player_id" => Player::inRandomOrder()->first()->id ? : Player::factory()->create()->id,  
        ];
    }
}
