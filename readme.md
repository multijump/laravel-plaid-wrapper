# Plaid API for Laravel

## You can install the package via composer:

```
composer require pkboom/laralve-plaid-api
```

## Setting up your Plaid Credentials
Add your Plain client id, secret, public key, env to your config/services.php:

```
// config/services.php
...
'Plain' => [
    'id' => env('PLAID_CLIENT_ID', ''), 
    'secret' => env('PLAID_SECRET', ''), 
    'public_key' => env('PLAID_PUBLIC_KEY', ''), 
    'env' => env('PLAID_ENV', 'sandbox'),
],
...
```

## Usage

Create a client:
```
$client = Client::create();
```

Exchange a public_token from Plaid Link for a Plaid access_token:
```
$response = $client->link()->exchange($publicToken);
$accessToken = $response['access_token'];
```

Refer to [Plaid](https://plaid.com/docs/) and [dpods/plaid-api-php-client](https://github.com/dpods/plaid-api-php-client) for further information.

### Testing

``` bash
composer test
```

## License

The MIT License (MIT). Please see [MIT license](http://opensource.org/licenses/MIT) for more information.