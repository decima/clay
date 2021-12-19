<?php

namespace App\Utils\Exceptions;

use Symfony\Component\Translation\TranslatableMessage;

class ExceptionManager
{

    /**
     * @throws UnprocessableEntityException
     */
    public function unprocessable($reason)
    {
        throw new UnprocessableEntityException($reason);
    }

    /**
     * @throws InternalException
     */
    public function internal($reason)
    {
        throw new InternalException($reason);
    }

    /**
     * @throws ConflictException
     */
    public function conflict($reason)
    {
        throw new ConflictException($reason);
    }

}