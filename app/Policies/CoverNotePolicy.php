<?php

namespace App\Policies;

use App\Models\CoverNote;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoverNotePolicy
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
        return $user->can('view cover notes');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CoverNote  $coverNote
     * @return mixed
     */
    public function view(User $user, CoverNote $coverNote)
    {
        return $user->can('view cover notes', $coverNote);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->can('create cover notes');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CoverNote  $coverNote
     * @return mixed
     */
    public function update(User $user, CoverNote $coverNote)
    {
        return $user->can('update cover notes', $coverNote);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CoverNote  $coverNote
     * @return mixed
     */
    public function delete(User $user, CoverNote $coverNote)
    {
        return $user->can('delete cover notes', $coverNote);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CoverNote  $coverNote
     * @return mixed
     */
    public function restore(User $user, CoverNote $coverNote)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\CoverNote  $coverNote
     * @return mixed
     */
    public function forceDelete(User $user, CoverNote $coverNote)
    {
        //
    }
}
