<?php

namespace App\Serializer;

use App\Entity\Tag;
use App\Utils\Exceptions\ExceptionManager;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareNormalizerInterface;

class TagNormalizer implements ContextAwareNormalizerInterface
{


    public function supportsNormalization(mixed $data, string $format = null, array $context = []): bool
    {
        return $data instanceof Tag;

    }

    /**
     * @param Tag $object
     * @param string|null $format
     * @param array $context
     * @return array
     */
    public function normalize(mixed $object, string $format = null, array $context = [])
    {
        $data=[];
        $data['id'] = $object->getId()->toRfc4122();
        $data['tag'] = $object->getName();
        return $data;
    }
}