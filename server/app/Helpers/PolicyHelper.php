<?php
namespace App\Helpers;

use App\Models\Users\User;
use Illuminate\Auth\Access\Response;

/**
 * Class PolicyHelper
 * @package App\Traits
 *
 * This class contains helper methods for policy checks.
 * Since we have duplicate method using different outputs
 * for different policies, we can use this helper class
 */



trait PolicyHelper
{
    public function permissionsForUser(User $user, array $models, string $message)
    {
        foreach ($models as $model) {
            if ($user->getOwner() instanceof $model) {
                return Response::allow();
            }
        }

        return Response::deny($message);
    }
}