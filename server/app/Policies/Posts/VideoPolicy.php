<?php

namespace App\Policies;

use App\Helpers\PolicyHelper;
use App\Models\Posts\Video;
use App\Models\Users\Player;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class VideoPolicy
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
            "You don't have permission to view any videos.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Video $video)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view this video.",
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
            "You don't have permission to create videos.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Video $video)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to update this video.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Video $video)
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
    public function restore(User $user, Video $video)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this video.",
        );;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Video $video)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this video.",
        );
    }
}
