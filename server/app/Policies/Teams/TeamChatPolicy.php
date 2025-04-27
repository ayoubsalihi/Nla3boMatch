<?php

namespace App\Policies\Teams;

use App\Helpers\PolicyHelper;
use App\Models\Teams\TeamChat;
use App\Models\Users\Player;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class TeamChatPolicy
{
    use PolicyHelper;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to view any teamchat.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, TeamChat $teamChat)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to view any teamchat.",
        );
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to create any teamchat.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, TeamChat $teamChat)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to update this teamchat.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, TeamChat $teamChat)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete any teamchat.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, TeamChat $teamChat)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to view any teamchat.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, TeamChat $teamChat)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to view any teamchat.",
        );
    }
}
