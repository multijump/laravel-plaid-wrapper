<?php

namespace Mackensiealvarezz\Plaid\Api;

class Institutions extends Api
{
    public function get($count = 10, $offset = 0, $options = [])
    {
        $post = array_merge(['count' => $count, 'offset' => $offset], $options);

        return $this->client->postWithAuth('/institutions/get', $post);
    }

    public function getById($institutionId, $options = [])
    {
        return $this->client->post('/institutions/get_by_id', [
            'public_key' => $this->client->publicKey,
            'institution_id' => $institutionId,
            'options' => $options
        ]);
    }

    public function search($query, $products = null, $options = [])
    {
        return $this->client->post('/institutions/search', [
            'query' => $query,
            'products' => $products,
            'public_key' => $this->client->publicKey,
            'options' => $options,
        ]);
    }
}
