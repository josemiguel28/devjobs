<?php

namespace App\Policies;

use App\Enums\UserRoles;
use App\Models\Transaccion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TransaccionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return auth()->user()->rol_id === UserRoles::ADMINISTRADOR;
    }

}
