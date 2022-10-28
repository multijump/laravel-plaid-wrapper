<?php

namespace Mackensiealvarezz\Plaid;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Mackensiealvarezz\Plaid\Exceptions\PlaidException;

class Plaid
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $publicKey;

    /**
     * @var string
     */
    private $env;

    /**
     * Plaid constructor.
     */
    public function __construct($clientId, $secret, $publicKey, $env)
    {
        $this->clientId = $clientId;
        $this->secret = $secret;
        $this->publicKey = $publicKey;
        $this->env = $env;
    }

    public static function create()
    {
        $id = config('services.plaid.id');
        $secret = config('services.plaid.secret');
        $publicKey = config('services.plaid.publicKey');
        $env = config('services.plaid.env');

        return new static($id, $secret, $publicKey, $env);
    }

    public function postWithAuth($path, $data)
    {
        $postData = array_merge($data, [
            'client_id' => $this->clientId,
            'secret' => $this->secret,
        ]);

        return $this->post($path, $postData);
    }

    public function post($path, $data = [])
    {
        // $response = new Client()->request('post', default = null)
        //post($this->url($path), $data);
        $client = new Client();

        $response = $client->post($this->url($path), [
            \GuzzleHttp\RequestOptions::JSON => $data
        ]);
        // $response = $client->request('post', $this->url($path), [
        //     "form_params" => $data
        // ]);
        if (array_key_exists('error_type', json_decode($response->getBody(), true))) {
            throw PlaidException::fromResponse($response);
        }

        return json_decode($response->getBody(), true);
    }

    public function url($url)
    {
        return vsprintf('%s/%s', [
            "https://{$this->env}.plaid.com",
            ltrim($url, '/'),
        ]);
    }

    public function __call($method, $parameters)
    {
        $class =  $this->getNamespace() . ucfirst($method);

        return new $class($this);
    }

    public function getNamespace()
    {
        return __NAMESPACE__ . '\\Api\\';
    }
}
