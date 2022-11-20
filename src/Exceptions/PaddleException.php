<?php

namespace SlashEquip\PaddlePhpSdk\Exceptions;

use RuntimeException;

class PaddleException extends RuntimeException
{
    public function __construct(string $message = "", int $code = 0)
    {
        parent::__construct($message, $code);
    }
}