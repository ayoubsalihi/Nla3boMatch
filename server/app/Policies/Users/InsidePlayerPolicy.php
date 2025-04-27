<?php

namespace App\Policies\Users;

use App\Helpers\PolicyHelper;
use App\Models\Users\Admin;
use App\Models\Users\InsidePlayer;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class InsidePlayerPolicy
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
            "You don't have permission to view any player",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, InsidePlayer $insidePlayer)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view any player",
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, InsidePlayer $insidePlayer)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to update any player",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, InsidePlayer $insidePlayer)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to delete any player.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, InsidePlayer $insidePlayer)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to restore any player.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, InsidePlayer $insidePlayer)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to force delete any player.",
        );
    }
}
