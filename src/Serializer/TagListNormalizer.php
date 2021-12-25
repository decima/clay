<?php

namespace App\Serializer;

use App\Entity\Tag;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class TagListNormalizer implements ContextAwareNormalizerInterface
{

    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return is_array($data) && count(array_filter($data, fn($e) => !($e instanceof Tag))) === 0;
    }

    public function normalize(mixed $object, string $format = null, array $context = [])
    {

        $listOfTags = [];

        /**
         * @var Tag[] $object
         */
        foreach ($object as $tag) {
            $listOfTags[$tag->getId()->toRfc4122()] = $tag->getName();
        }
        return $listOfTags;
    }
}