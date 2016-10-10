<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'admin.partials._sidebar', 'App\Hyrax\Composers\SidebarAdminComposer'
        );

        view()->composer(
            'genaral.partials._nav', 'App\Hyrax\Composers\NavbarComposer'
        );

        view()->composer(
            'front.partials._sidebar', 'App\Hyrax\Composers\SidebarComposer'
        );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
