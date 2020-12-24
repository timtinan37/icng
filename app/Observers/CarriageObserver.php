<?php

namespace App\Observers;

use App\Models\Carriage;
use Illuminate\Support\Facades\Log;

class CarriageObserver
{
    /**
     * Handle the carriage "created" event.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return void
     */
    public function created(Carriage $carriage)
    {
        Log::channel('carriages')->info("Carriage created.", ['attributes' => $carriage->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the carriage "updating" event.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return void
     */
    public function updating(Carriage $carriage)
    {
        Log::channel('carriages')->info("Carriage updated.", ['old_carriage_type_attributes' => $carriage->getOriginal(), 'new_carriage_type_attributes' => $carriage->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the carriage "deleted" event.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return void
     */
    public function deleted(Carriage $carriage)
    {
        Log::channel('carriages')->info("Carriage deleted.", ['attributes' => $carriage->getAttributes(), 'deleted_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the carriage "restored" event.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return void
     */
    public function restored(Carriage $carriage)
    {
        //
    }

    /**
     * Handle the carriage "force deleted" event.
     *
     * @param  \App\Models\Carriage  $carriage
     * @return void
     */
    public function forceDeleted(Carriage $carriage)
    {
        //
    }
}
