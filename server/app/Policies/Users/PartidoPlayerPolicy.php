<?php

namespace App\Policies\Users;

use App\Helpers\PolicyHelper;
use App\Models\Users\Admin;
use App\Models\Users\PartidoPlayer;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class PartidoPlayerPolicy
{
    use PolicyHelper;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to view any layer participate in matches.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PartidoPlayer $matchPlayer)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any player participate in match.",
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
            "You don't have permission to view any player participate in match.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PartidoPlayer $matchPlayer)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to update any player participate in match.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PartidoPlayer $matchPlayer)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to delete any player participate in match.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PartidoPlayer $matchPlayer)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to restore any player participate in match.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PartidoPlayer $matchPlayer)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to fore delete any player participate in match.",
        );
    }
}
