<?php

namespace App\Observers;

use App\Models\Risk;
use Illuminate\Support\Facades\Log;

class RiskObserver
{
    /**
     * Handle the risk "created" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function created(Risk $risk)
    {
        Log::channel('risks')->info("Risk created.", ['attributes' => $risk->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the risk "updating" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function updating(Risk $risk)
    {
        Log::channel('risks')->info("Risk updated.", ['old_risk_attributes' => $risk->getOriginal(), 'new_risk_attributes' => $risk->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the risk "deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function deleted(Risk $risk)
    {
        Log::channel('risks')->info("Risk deleted.", ['attributes' => $risk->getAttributes(), 'deleted_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);        
    }

    /**
     * Handle the risk "restored" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function restored(Risk $risk)
    {
        //
    }

    /**
     * Handle the risk "force deleted" event.
     *
     * @param  \App\Models\Risk  $risk
     * @return void
     */
    public function forceDeleted(Risk $risk)
    {
        //
    }
}
