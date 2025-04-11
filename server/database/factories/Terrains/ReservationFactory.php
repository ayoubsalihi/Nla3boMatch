<?php

namespace Database\Factories\Terrains;

use App\Models\Teams\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "date_reservation" => $this->faker->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d'),
            "status" => $this->faker->randomElement(["en attente", "confirmé", "abandonnée"]),
            "team_id" => Team::inRandomOrder()->first()->id ?? Team::factory()->create()->id,
        ];
    }
}
