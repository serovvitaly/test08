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
        $this->app->bind(\App\Services\CityServiceInterface::class, function(){
            return new \App\Services\CityService;
        });
        $this->app->bind(\App\Services\TransactionServiceInterface::class, function(){
            return new \App\Services\TransactionService;
        });
        $this->app->bind(\domain\WalletEntityInterface::class, function(){
            return new \domain\WalletService;
        });
    }
}
