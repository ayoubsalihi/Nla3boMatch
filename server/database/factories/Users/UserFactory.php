<?php

namespace Database\Factories\Users;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Users\Player;
use App\Models\Users\Admin;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    $type_utilisateur = fake()->randomElement(['player', 'admin']);

    return [
        'nom' => fake()->name(),
        'prenom' => fake()->name(),
        'cin' => fake()->unique()->numberBetween(10000000, 99999999),
        'type_utilisateur' => $type_utilisateur,
        'telephone' => fake()->unique()->phoneNumber(),
        'ville_residence' => fake()->city(),
        'quartier' => fake()->streetName(),
        // player_id and admin_id are foreign keys to determine the user type.
        'email' => fake()->unique()->safeEmail(),
        'email_verified_at' => now(),
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
    ];
}


    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
