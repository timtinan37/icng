<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\Carriage;
use App\Models\CoverNote;
use App\Models\Risk;
use App\Models\Transit;
use App\Models\User;
use App\Observers\BranchObserver;
use App\Observers\CarriageObserver;
use App\Observers\CoverNoteObserver;
use App\Observers\RiskObserver;
use App\Observers\TransitObserver;
use App\Observers\UserObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        Branch::observe(BranchObserver::class);
        Carriage::observe(CarriageObserver::class);
        CoverNote::observe(CoverNoteObserver::class);    
        Risk::observe(RiskObserver::class);
        Transit::observe(TransitObserver::class);
        User::observe(UserObserver::class);
    }
}
