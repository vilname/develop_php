<?php

namespace App\Models\Users;

use App\Entity\User;
use App\EntityManagerFactory;
use Doctrine\ORM\EntityManager;

class UserRepository
{
    public EntityManager $entityManager;

    public function __construct()
    {
        $this->entityManager = EntityManagerFactory::query();
    }

    public function getToken():string
    {
        /** @var User $users */
        $users = $this->getUser();

        return $users->getToken();
    }

    public function getUser()
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['login' => 'ivan', 'password' => '123']);
    }

    public function getUserByToken($token)
    {
        return $this->entityManager->getRepository(User::class)->findOneBy(['token' => $token]);
    }
}
