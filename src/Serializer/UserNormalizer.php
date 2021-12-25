<?php

namespace App\Serializer;

use App\Entity\User;
use App\Utils\Exceptions\ExceptionManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class UserNormalizer implements ContextAwareNormalizerInterface
{



    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof User;

    }

    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        $data['email'] = $object->getUserIdentifier();
        $data['roles'] = $object->getRoles();
        return $data;
    }
}