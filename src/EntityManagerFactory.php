<?php

namespace App;

use Doctrine\ORM\EntityManager;

require_once '../bootstrap.php';

class EntityManagerFactory
{
    public static function query(): EntityManager
    {
        /** @var EntityManager $entityManager */
        return $entityManager;
    }
}
