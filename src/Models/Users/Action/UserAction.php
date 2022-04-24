<?php

namespace App\Models\Users\Action;

use App\Interfaces\ApiResultInterface;
use App\Models\Users\UserRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;

class UserAction implements ApiResultInterface
{
    public function execute(array $itemsEntityDto): JsonResponse
    {
        try {
            $userRepository = new UserRepository();
            $token = $userRepository->getToken();
        } catch (\Exception $e) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка получения токена'
                ],
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => ['token' => $token],
            'status_code' => 'success'
        ]);
    }
}