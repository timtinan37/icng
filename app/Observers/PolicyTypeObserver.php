<?php

namespace App\Observers;

use App\Models\PolicyType;
use Illuminate\Support\Facades\Log;

class PolicyTypeObserver
{
    /**
     * Handle the policy type "created" event.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return void
     */
    public function created(PolicyType $policyType)
    {
        Log::channel('policy-types')->info("Policy type created.", ['attributes' => $policyType->getAttributes(), 'created_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the branch "updating" event.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return void
     */
    public function updating(PolicyType $policyType)
    {
        Log::channel('policy-types')->info("Policy type updated.", ['old_policy_type_attributes' => $policyType->getOriginal(), 'new_policy_type_attributes' => $policyType->getAttributes(), 'updated_by' => auth()->user()->name . " (user_id: " . auth()->user()->id . ")"]);
    }

    /**
     * Handle the policy type "deleted" event.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return void
     */
    public function deleted(PolicyType $policyType)
    {
        //
    }

    /**
     * Handle the policy type "restored" event.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return void
     */
    public function restored(PolicyType $policyType)
    {
        //
    }

    /**
     * Handle the policy type "force deleted" event.
     *
     * @param  \App\Models\PolicyType  $policyType
     * @return void
     */
    public function forceDeleted(PolicyType $policyType)
    {
        //
    }
}
