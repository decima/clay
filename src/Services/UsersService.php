<?php

namespace App\Services;

use App\Entity\User;
use App\Models\Users\RegistrationDataObject;
use App\Repository\UserRepository;
use App\Utils\Exceptions\ExceptionManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersService
{
    public function __construct(
        private EntityManagerInterface      $entityManager,
        private UserPasswordHasherInterface $passwordHasher,
        private UserRepository              $userRepository,
        private ExceptionManager            $exceptionManager,
    )
    {
    }

    /**
     * @throws \App\Utils\Exceptions\ConflictException
     */
    public function register(RegistrationDataObject $dataObject): User
    {
        if ($this->userRepository->findOneBy(["email" => $dataObject->email])) {
            $this->exceptionManager->conflict("user.registration.conflict");
        }

        $user = new User();

        $user
            ->setEmail($dataObject->email)
            ->setPassword($this->passwordHasher->hashPassword($user, $dataObject->password));

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

}