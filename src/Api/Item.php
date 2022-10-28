<?php

namespace Mackensiealvarezz\Plaid\Api;

class Item extends Api
{
    public function getAccounts($accessToken)
    {
        return $this->client->postWithAuth('/accounts/get', [
            'access_token' => $accessToken,
        ]);
    }

    public function get($accessToken)
    {
        return $this->client->postWithAuth('/item/get', [
            'access_token' => $accessToken
        ]);
    }

    public function remove($accessToken)
    {
        return $this->client->postWithAuth('/item/remove', [
            'access_token' => $accessToken
        ]);
    }

    public function invalidate($accessToken)
    {
        return $this->client->postWithAuth('/item/access_token/invalidate', [
            'access_token' => $accessToken
        ]);
    }

    public function update($accessToken, $webhook)
    {
        return $this->client->postWithAuth('/item/webhook/update', [
            'access_token' => $accessToken,
            'webhook' => $webhook,
        ]);
    }
}
