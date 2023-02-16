<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway(
                [
                    'environment' => 'sandbox',
                    'merchantId' => 's9y9k7ck2s8gnq7g',
                    'publicKey' => '9tdk3wpvtpmz7wk4',
                    'privateKey' => '5ccf1cf1609db5803fd8a31af80056d0'
                ]

            );
        });
    }
}