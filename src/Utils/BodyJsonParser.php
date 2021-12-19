<?php

namespace App\Utils;

use App\Models\JsonParsableDataObject;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentValueResolverInterface;
use Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadata;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Contracts\Cache\ItemInterface;

class BodyJsonParser implements ArgumentValueResolverInterface
{

    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface  $validator
    )
    {
    }

    public function supports(Request $request, ArgumentMetadata $argument): bool
    {
        try {
            $item = new ($argument->getType())();
            return $item instanceof JsonParsableDataObject;
        } catch (\Throwable $throwable) {
            return false;
        }
    }

    public function resolve(Request $request, ArgumentMetadata $argument):iterable
    {
        $object = $this->serializer->deserialize($request->getContent(), $argument->getType(), 'json');
        $errors = $this->validator->validate($object);

        if (count($errors) > 0) {

            $errorsString = (string)$errors;

            throw new HttpException(422, $errorsString);
        }

        return [$object];
    }
}