<?php

namespace App\Serializer;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class UserNormalizer implements ContextAwareNormalizerInterface
{

    public function __construct(private ObjectNormalizer $normalizer)
    {
    }

    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof UserInterface;

    }

    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        $data=[];
        if (!$object instanceof UserInterface) {
            throw new \Exception("shit happens");
        }
        $data['userIdentifier'] = $object->getUserIdentifier();
        $data['roles'] = $object->getRoles();
        return $data;
    }
}