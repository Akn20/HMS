<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
<<<<<<< HEAD
use App\Models\Organization;
use App\Models\Institution;
use Illuminate\Support\Facades\View;
=======
>>>>>>> origin/main

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
<<<<<<< HEAD
        View::composer('*', function ($view) {
            $view->with('organizationCount', Organization::count());
            $view->with('institutionCount', Institution::count());
        });
    }

=======
        //
    }
>>>>>>> origin/main
}
