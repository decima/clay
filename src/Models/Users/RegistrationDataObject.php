<?php

namespace App\Models\Users;

use App\Models\JsonParsableDataObject;
use Symfony\Component\Validator\Constraints as Assert;

class RegistrationDataObject implements JsonParsableDataObject
{
    #[Assert\NotBlank]
    #[Assert\Email]
    public string $email;

    //#[Assert\NotCompromisedPassword]
    #[Assert\NotBlank]
    #[Assert\Length(min: 6)]
    public string $password;

    #[Assert\NotBlank]
    public bool $tosAccepted;
}