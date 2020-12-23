<?php

namespace App\Policies;

use App\Models\Risk;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RiskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->can('view risks');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Risk  $risk
     * @return mixed
     */
    public function view(User $user, Risk $risk)
    {
        return $user->can('view risks', $risk);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create risks');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Risk  $risk
     * @return mixed
     */
    public function update(User $user, Risk $risk)
    {
        return $user->can('update risks', $risk);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Risk  $risk
     * @return mixed
     */
    public function delete(User $user, Risk $risk)
    {
        return $user->can('delete risks', $risk);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Risk  $risk
     * @return mixed
     */
    public function restore(User $user, Risk $risk)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Risk  $risk
     * @return mixed
     */
    public function forceDelete(User $user, Risk $risk)
    {
        //
    }
}