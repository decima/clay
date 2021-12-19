<?php

namespace App\Utils\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class InternalException extends CustomException
{

    public function getHTTPCode(): int
    {
        return Response::HTTP_INTERNAL_SERVER_ERROR;
    }
}