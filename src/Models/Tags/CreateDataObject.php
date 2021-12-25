<?php

namespace App\Models\Tags;

use App\Models\JsonParsableDataObject;
use Symfony\Component\Validator\Constraints as Assert;

class CreateDataObject implements JsonParsableDataObject
{
    #[Assert\NotBlank]
    public string $name;

}