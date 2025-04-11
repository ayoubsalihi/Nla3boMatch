<?php

namespace Database\Factories\Users;

use App\Models\Users\Admin;
use App\Models\Users\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Permission>
 */
class PermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "type" => $this->faker->word,
            // each admin is assigned to a role and its permissions
            "admin_id" => Admin::factory()->create()->id,
            "role_id" => Role::factory()->create()->id,
        ];
    }
}
