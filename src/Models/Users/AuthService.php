<?php

namespace App\Models\Users;

class AuthService
{
    public static function checkAuth(string $token)
    {
        $userRepository = new UserRepository();
        return $userRepository->getUserByToken(explode(' ', $token)[1]);
    }
}