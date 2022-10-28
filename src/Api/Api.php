<?php

namespace Mackensiealvarezz\Plaid\Api;

use Pkboom\LaravelPlaidApi\Client;

class Api
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function client()
    {
        return $this->client;
    }
}
