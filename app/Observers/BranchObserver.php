<?php

namespace App\Observers;

use App\Models\Branch;
use Illuminate\Support\Facades\Log;

class BranchObserver
{
    /**
     * Handle the branch "created" event.
     *
     * @param  \App\Models\Branch  $branch
     * @return void
     */
    public function created(Branch $branch)
    {
        Log::channel('branches')->info("Branch created.", ['attributes' => $branch->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);        
    }

    /**
     * Handle the branch "updating" event.
     *
     * @param  \App\Models\Branch  $branch
     * @return void
     */
    public function updating(Branch $branch)
    {
        Log::channel('branches')->info("Branch updated.", ['old_branch_attributes' => $branch->getOriginal(), 'new_branch_attributes' => $branch->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the branch "deleted" event.
     *
     * @param  \App\Models\Branch  $branch
     * @return void
     */
    public function deleted(Branch $branch)
    {
        //
    }

    /**
     * Handle the branch "restored" event.
     *
     * @param  \App\Models\Branch  $branch
     * @return void
     */
    public function restored(Branch $branch)
    {
        //
    }

    /**
     * Handle the branch "force deleted" event.
     *
     * @param  \App\Models\Branch  $branch
     * @return void
     */
    public function forceDeleted(Branch $branch)
    {
        //
    }
}
