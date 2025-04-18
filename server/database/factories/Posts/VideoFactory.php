<?php

namespace Database\Factories\Posts;

use App\Models\Posts\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "intitule" => $this->faker->sentence(3),
            "description" => $this->faker->paragraph(3),
            "post_id" => Post::inRandomOrder()->first()->id ?? Post::factory()->create()->id,
        ];
    }
}
