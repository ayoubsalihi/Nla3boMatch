<?php

namespace App\Policies\Posts;

use App\Helpers\PolicyHelper;
use App\Models\Posts\Image;
use App\Models\Users\Player;
use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

class ImagePolicy
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
            "You don't have permission to view any images.",
        );
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Image $image)
    {
        return $this->permissionsForUser(
            $user,
            [User::class],
            "You don't have permission to view this image.",
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
            "You don't have permission to create images.",
        );
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Image $image)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to update this image.",
        );
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Image $image)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this image.",
        );
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Image $image)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this image.",
        );
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Image $image)
    {
        return $this->permissionsForUser(
            $user,
            [Player::class],
            "You don't have permission to delete this video.",
        );
    }
}
