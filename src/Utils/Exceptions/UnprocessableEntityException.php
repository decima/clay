<?php

namespace App\Utils\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UnprocessableEntityException extends CustomException
{

    public function getHTTPCode(): int
    {
        return Response::HTTP_UNPROCESSABLE_ENTITY;
    }
}