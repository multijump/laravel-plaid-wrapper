<?php

namespace Mackensiealvarezz\Plaid\Exceptions;

use Exception;

class PlaidException extends Exception
{
    public static function fromResponse($response)
    {
        return new static(json_encode($response));
    }
}
