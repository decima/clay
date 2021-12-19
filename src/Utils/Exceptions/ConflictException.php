<?php

namespace App\Utils\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class ConflictException extends CustomException
{
    public function getHTTPCode(): int
    {
        return Response::HTTP_CONFLICT;
    }
}