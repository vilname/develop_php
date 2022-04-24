<?php

namespace App\Controller\v1;

use App\Models\Users\Action\UserAction;
use Laminas\Diactoros\Response\JsonResponse;

class UserController
{
    public function getToken(): JsonResponse
    {
        $action = new UserAction();
        return $action->execute([]);
    }
}