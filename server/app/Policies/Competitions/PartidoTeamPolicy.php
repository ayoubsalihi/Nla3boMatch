<?php

namespace App\Policies\Competitions;

use App\Helpers\PolicyHelper;
use App\Models\Competitions\PartidoTeam;
use App\Models\Users\Admin;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class PartidoTeamPolicy
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
            "You don't have permission to view any team played matches.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PartidoTeam $partidoTeam)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any team played matches.",
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
            "You don't have permission to create any team played matches.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PartidoTeam $partidoTeam)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to update any team played matches.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PartidoTeam $partidoTeam)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to delete any team played matches.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PartidoTeam $partidoTeam)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to restore any team played matches.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PartidoTeam $partidoTeam)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to force delete any team played matches.",
        );
    }
}
