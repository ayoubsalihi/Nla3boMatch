<?php

namespace App\Policies\Competitions;

use App\Helpers\PolicyHelper;
use App\Models\Competitions\Competition;
use App\Models\Users\Admin;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class CompetitionPolicy
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
            "You don't have permission to view any competition.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Competition $competition)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any competition.",
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
            "You don't have permission to create any competition.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Competition $competition)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to update any competition.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Competition $competition)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to delete any competition.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Competition $competition)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to restore any competition.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Competition $competition)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to force delete any competition.",
        );
    }
}
