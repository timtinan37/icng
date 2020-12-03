<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Branch;
use App\Observers\UserObserver;
use App\Observers\BranchObserver;
use  Illuminate\Support\Facades\Schema;
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

        User::observe(UserObserver::class);
        Branch::observe(BranchObserver::class);
    }
}
