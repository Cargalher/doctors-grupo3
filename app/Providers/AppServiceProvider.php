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
                    'merchantId' => 'gkjp48fbys9w4xzp',
                    'publicKey' => 'y5sw5p7vbrdpg862',
                    'privateKey' => 'f1f7406e833663f1e1dd3fcb92c3a7f4'
                ]
            );
        });
    }
}
