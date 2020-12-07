<?php

namespace App\Policies;

use App\Models\PolicyType;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PolicyTypePolicy
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
        return $user->can('view policy types');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PolicyType  $policyType
     * @return mixed
     */
    public function view(User $user, PolicyType $policyType)
    {
        return $user->can('view policy types', $policyType);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create policy types');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PolicyType  $policyType
     * @return mixed
     */
    public function update(User $user, PolicyType $policyType)
    {
        return $user->can('update policy types', $policyType);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PolicyType  $policyType
     * @return mixed
     */
    public function delete(User $user, PolicyType $policyType)
    {
        return $user->can('delete policy types', $policyType);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PolicyType  $policyType
     * @return mixed
     */
    public function restore(User $user, PolicyType $policyType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PolicyType  $policyType
     * @return mixed
     */
    public function forceDelete(User $user, PolicyType $policyType)
    {
        //
    }
}
