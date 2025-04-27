<?php

namespace App\Policies\Competitions;

use App\Helpers\PolicyHelper;
use App\Models\Competitions\Partido;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class PartidoPolicy
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
            "You don't have permission to view any partido.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Partido $partido)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any match.",
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to create any partido.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Partido $partido)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to upate any partido.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Partido $partido)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to delete any partido.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Partido $partido)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to restore any partido.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Partido $partido)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to force delete any partido.",
        );
    }
}
