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
                    'merchantId' => 'gw5p9wsmy5hgkyw7',
                    'publicKey' => 'fhr2bw2kwn9qqtg9',
                    'privateKey' => 'b1344e6de7c7bfc09962d7f47375b12f'
                ]

            );
        });
    }
}
