<?php

namespace Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Pkboom\LaravelPlaidApi\LaravelPlaidApiServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelPlaidApiServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('services.plaid', [
            'id'   => '5cd9b2a4c08af900121eb604',
            'secret' => 'cc302bafc3a09bf17547936cb12752',
            'publicKey'   => '4bf0ff80d4a0d33da8ea34c256b67a',
            'env'   => 'sandbox',
        ]);
    }
}
