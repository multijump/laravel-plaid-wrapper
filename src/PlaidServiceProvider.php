<?php

namespace Mackensiealvarezz\Plaid;

use illuminate\support\ServiceProvider;
use Mackensiealvarezz\Plaid\Plaid;

class PlaidServiceProvider extends ServiceProvider
{
    //when the application is loaded
    public function boot()
    {
    }

    public function register()
    {
        $this->app->bind('plaid', function () {
            return new Plaid();
        });
    }
}
