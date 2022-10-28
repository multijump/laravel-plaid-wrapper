<?php

namespace Mackensiealvarezz\Plaid\Facades;

use Illuminate\Support\Facades\Facade;

class PlaidFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'plaid';
    }
}
