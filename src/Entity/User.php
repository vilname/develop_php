<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
{
    /**
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private string $id;

    /**  @ORM\Column(type="string", name="login") */
    private string $login;

    /**  @ORM\Column(type="string") */
    private string $password;

    /**  @ORM\Column(type="string") */
    private string $token;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
