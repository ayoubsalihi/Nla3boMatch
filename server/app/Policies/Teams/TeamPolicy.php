<?php

namespace App\Policies\Teams;

use App\Helpers\PolicyHelper;
use App\Models\Teams\Team;
use App\Models\Users\Admin;
use App\Models\Users\Player;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class TeamPolicy
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
            "You don't have permission to view any teams.",
        );;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Team $team)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to view this team.",
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class,Admin::class],
            "You don't have permission to create any team.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Team $team)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class,Admin::class],
            "You don't have permission to update this team.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Team $team)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this video.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Team $team)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to restore this team.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Team $team)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to permenently delete this video.",
        );
    }
}
