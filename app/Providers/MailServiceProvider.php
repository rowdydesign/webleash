<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
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
        $this->app->bind('\App\Contracts\Mail\SendsMailContract', '\App\Traits\Mail\SendsMail');
        $this->app->bind('\App\Contracts\Mail\Services\AccountConfirmationServiceContract', '\App\Services\Mail\AccountConfirmationService');
    }
}
