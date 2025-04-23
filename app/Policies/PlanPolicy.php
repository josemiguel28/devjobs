<?php

namespace App\Policies;

use App\Enums\UserRoles;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->rol_id == UserRoles::RECLUTADOR ||
               $user->rol_id == UserRoles::ADMINISTRADOR;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Plan $plan): bool
    {
        return $user->rol_id == UserRoles::RECLUTADOR ||
            $user->rol_id == UserRoles::ADMINISTRADOR;
    }

    /**
     * Determine whether the user can purchase a new plan.
     */
    public function enviar(User $user, Plan $plan): bool
    {
        return $user->rol_id == UserRoles::RECLUTADOR;
    }
}
