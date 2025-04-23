<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use App\Enums\UserRoles;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): Response
    {
        return $user->rol_id === UserRoles::ADMINISTRADOR
            ? Response::allow()
            : Response::deny('No tienes permiso para acceder a esta página.');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): Response
    {
        return $user->rol_id === UserRoles::ADMINISTRADOR
            ? Response::allow()
            : Response::deny('No tienes permiso para acceder a esta página.');
    }

}
