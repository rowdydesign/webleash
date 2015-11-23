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
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('\App\Contracts\Auth\RegistrationServiceContract', '\App\Services\Auth\RegistrationService');

        $this->app->bind('\App\Contracts\Repositories\UserRepositoryContract', '\App\Repositories\UserRepository');
        $this->app->bind('\App\Contracts\User\LookupServiceContract', '\App\Services\User\LookupService');

        $this->app->bind('\App\Contracts\Repositories\WidgetRepositoryContract', '\App\Repositories\WidgetRepository');
        $this->app->bind('\App\Contracts\Widget\CreateServiceContract', '\App\Services\Widget\CreateService');
        $this->app->bind('\App\Contracts\Widget\LookupServiceContract', '\App\Services\Widget\LookupService');
        $this->app->bind('\App\Contracts\Widget\UpdateServiceContract', '\App\Services\Widget\UpdateService');
        $this->app->bind('\App\Contracts\Widget\DeleteServiceContract', '\App\Services\Widget\DeleteService');
    }
}
