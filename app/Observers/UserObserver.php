<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    /**
     * Handle the user "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        Log::channel('users')->info("User account created for $user->name.", ['email' => $user->email, 'user_id' => $user->id, 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the user "updating" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updating(User $user)
    {
        Log::channel('users')->info("User account updating for $user->name.", ['old_user_attributes' => $user->getOriginal(), 'new_user_attributes' => $user->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        Log::channel('users')->info("User account deleted for $user->name.", ['email' => $user->email, 'user_id' => $user->id, 'deleted_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
