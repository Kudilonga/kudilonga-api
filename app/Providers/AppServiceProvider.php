<?php

namespace App\Providers;

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
        $this->app->bind(
            'App\Repositories\Contracts\V1\LanguageRepositoryInterface',
            'App\Repositories\Eloquent\V1\LanguageRepository'
        );

        $this->app->bind(
            'App\Repositories\Contracts\V1\WordRepositoryInterface',
            'App\Repositories\Eloquent\V1\WordRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
