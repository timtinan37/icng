<?php

namespace App\Observers;

use App\Models\CoverNote;
use Illuminate\Support\Facades\Log;

class CoverNoteObserver
{
    /**
     * Handle the cover note "created" event.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return void
     */
    public function created(CoverNote $coverNote)
    {
        Log::channel('cover-notes')->info("Cover Note created.", ['attributes' => $coverNote->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the cover note "updating" event.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return void
     */
    public function updating(CoverNote $coverNote)
    {
        Log::channel('cover-notes')->info("Cover Note updated.", ['old_coverNote_attributes' => $coverNote->getOriginal(), 'new_coverNote_attributes' => $coverNote->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the cover note "deleted" event.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return void
     */
    public function deleted(CoverNote $coverNote)
    {
        //
    }

    /**
     * Handle the cover note "restored" event.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return void
     */
    public function restored(CoverNote $coverNote)
    {
        //
    }

    /**
     * Handle the cover note "force deleted" event.
     *
     * @param  \App\Models\CoverNote  $coverNote
     * @return void
     */
    public function forceDeleted(CoverNote $coverNote)
    {
        //
    }
}
