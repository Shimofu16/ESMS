<?php

namespace App\Providers;

use App\Models\Active_SchoolYearAndSem;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        // View::share([
        //    'active' => Active_SchoolYearAndSem::find(1)
        // ]);
    }
}
