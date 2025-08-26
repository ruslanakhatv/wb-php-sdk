<?php

namespace WB\SDK\Exceptions;

class AuthorizationException extends ApiException
{
    public function __construct(string $message = "Authorization failed", int $code = 401)
    {
        parent::__construct($message, $code);
    }
}
