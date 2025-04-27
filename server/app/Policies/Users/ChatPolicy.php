<?php

namespace App\Policies\Users;

use App\Helpers\PolicyHelper;
use App\Models\Users\Admin;
use App\Models\Users\User;
use App\Models\Users\Chat;
use App\Models\Users\Player;
use Illuminate\Auth\Access\Response;

class ChatPolicy
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
            "You don't have permission to view any chat.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chat $chat)
    {
        
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to view any chat.",
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
            "You don't have permission to create any chat.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chat $chat)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to update any chat.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chat $chat)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to delete any chat.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chat $chat)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to restore any chat.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chat $chat)
    {
        return $this->permissionsForUser(
            $user,
            [Admin::class],
            "You don't have permission to force delete any chat.",
        );
    }
}
