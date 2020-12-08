<?php

namespace App\Policies;

use App\Models\Transit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransitPolicy
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
        return $user->can('view transits');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transit  $transit
     * @return mixed
     */
    public function view(User $user, Transit $transit)
    {
        return $user->can('view transits', $transit);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create transits');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transit  $transit
     * @return mixed
     */
    public function update(User $user, Transit $transit)
    {
        return $user->can('update transits', $transit);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transit  $transit
     * @return mixed
     */
    public function delete(User $user, Transit $transit)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transit  $transit
     * @return mixed
     */
    public function restore(User $user, Transit $transit)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Transit  $transit
     * @return mixed
     */
    public function forceDelete(User $user, Transit $transit)
    {
        //
    }
}
