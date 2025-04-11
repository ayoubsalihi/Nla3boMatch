<?php

namespace Database\Factories\Posts;

use App\Models\Competitions\Competition;
use App\Models\Competitions\Partido;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "description" => $this->faker->sentence,
            "type_post" => $this->faker->sentence,
            "user_id" =>User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            "match_id" =>Partido::inRandomOrder()->first()->id ?? partido::factory()->create()->id,
            "competition_id" =>Competition::inRandomOrder()->first()->id ?? Competition::factory()->create()->id,
        ];
    }
}
