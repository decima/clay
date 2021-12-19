<?php

namespace App\Utils\Exceptions;

use Throwable;

abstract class CustomException extends \Exception
{
    public abstract function getHTTPCode(): int;

    public function __construct($message = "")
    {
        parent::__construct($message);
    }
}