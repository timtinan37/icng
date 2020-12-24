<?php

namespace App\Observers;

use App\Models\Transit;
use Illuminate\Support\Facades\Log;

class TransitObserver
{
    /**
     * Handle the transit "created" event.
     *
     * @param  \App\Models\Transit  $transit
     * @return void
     */
    public function created(Transit $transit)
    {
        Log::channel('transits')->info("Transit created.", ['attributes' => $transit->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the transit "updating" event.
     *
     * @param  \App\Models\Transit  $transit
     * @return void
     */
    public function updating(Transit $transit)
    {
        Log::channel('transits')->info("Transit updated.", ['old_transit_type_attributes' => $transit->getOriginal(), 'new_transit_type_attributes' => $transit->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);

    }

    /**
     * Handle the transit "deleted" event.
     *
     * @param  \App\Models\Transit  $transit
     * @return void
     */
    public function deleted(Transit $transit)
    {
        Log::channel('transits')->info("Transit deleted.", ['attributes' => $transit->getAttributes(), 'deleted_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the transit "restored" event.
     *
     * @param  \App\Models\Transit  $transit
     * @return void
     */
    public function restored(Transit $transit)
    {
        //
    }

    /**
     * Handle the transit "force deleted" event.
     *
     * @param  \App\Models\Transit  $transit
     * @return void
     */
    public function forceDeleted(Transit $transit)
    {
        //
    }
}
