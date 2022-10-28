<?php

namespace Tests\Unit;

use Tests\TestCase;
use Pkboom\LaravelPlaidApi\Client;
use Pkboom\LaravelPlaidApi\Api\Api;
use Pkboom\LaravelPlaidApi\Exceptions\PlaidException;

class PlaidTest extends TestCase
{
    /** @test */
    public function get_institutions()
    {
        $response = Client::create()->institutions()->get(10);

        $this->assertCount(10, $response['institutions']);
    }
    
    /** @test */
    public function wrong_api()
    {
        $this->expectException(PlaidException::class);

        Client::create()->post('/institutions/fake-get');
    }
}
