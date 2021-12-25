<?php

namespace App\Controller\API;

use App\Entity\User;
use App\Models\Users as UsersModel;
use App\Services\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\CurrentUser;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/users', name: 'users.')]
class UserController extends AbstractController
{
    #[Route('/me', name: 'me', methods: ['GET'])]
    public function me(#[CurrentUser] User $user): JsonResponse
    {
        return $this->json($user);
    }

    /**
     * @throws \App\Utils\Exceptions\ConflictException
     */
    #[Route('/register', name: 'register', methods: ['POST'])]
    public function register(UsersModel\RegistrationDataObject $dataObject, UserService $usersService): JsonResponse
    {

        $user = $usersService->register($dataObject);
        return $this->json($user, 200);
    }

}
