<?php

namespace App\Policies\Terrains;

use App\Helpers\PolicyHelper;
use App\Models\Terrains\Terrain;
use App\Models\Users\Admin;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class TerrainPolicy
{
    use PolicyHelper;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any terrain.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Terrain $terrain)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any terrain.",
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to create any terrain.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Terrain $terrain)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to update any terrain.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Terrain $terrain)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to delete any terrain.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Terrain $terrain)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to restore any terrain.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Terrain $terrain)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to force delete any terrain.",
        );
    }
}
