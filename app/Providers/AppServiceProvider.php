<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Organization;
use App\Models\Institution;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $view->with('organizationCount', Organization::count());
            $view->with('institutionCount', Institution::count());
        });
    }

}
