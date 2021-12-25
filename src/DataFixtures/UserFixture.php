<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        foreach ($this->data() as $d) {
            $user = (new User())
                ->setEmail($d['email'])
                ->setRoles($d['roles']);
            $user->setPassword($this->userPasswordHasher->hashPassword($user, '123456'));
            $manager->persist($user);
            $this->addReference($d['id'], $user);
        }
        $manager->flush();
    }

    private function data(): array
    {
        return [
            [
                'id' => 'USER_HENRI',
                'email' => 'henri@larget.fr',
                'roles' => ['ROLE_ADMIN']
            ],
            [
                'id' => 'USER_NADIA',
                'email' => 'nadia@larget.fr',
                'roles' => []
            ],

        ];
    }
}
