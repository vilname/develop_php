<?php

namespace App\Controller\v1;

use App\Models\Items\Action\CreateAction;
use App\Models\Items\Action\DeleteAction;
use App\Models\Items\Action\ReadAction;
use App\Models\Items\Action\UpdateAction;
use App\Models\Items\Dto\ItemDto;
use App\Models\Users\AuthService;
use App\Resources\ErrorResource;
use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequest;

class ItemController
{
    public function create(ServerRequest $request): JsonResponse
    {

        if (!$request->getHeader('Authorization') || !AuthService::checkAuth($request->getHeader('Authorization')[0])) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка авторизации'
                ],
                'status_code' => 'error'
            ]);
        }

        $action = new CreateAction();
        return $action->execute(ItemDto::nestedMap(json_decode($request->getBody()->getContents(), true)));
    }

    public function read(ServerRequest $request): JsonResponse
    {

        if (!$request->getHeader('Authorization') || !AuthService::checkAuth($request->getHeader('Authorization')[0])) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка авторизации'
                ],
                'status_code' => 'error'
            ]);
        }

        $action = new ReadAction();
        return $action->execute([]);
    }

    public function update(ServerRequest $request, int $id): JsonResponse
    {

        if (!$request->getHeader('Authorization') || !AuthService::checkAuth($request->getHeader('Authorization')[0])) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка авторизации'
                ],
                'status_code' => 'error'
            ]);
        }

        $action = new UpdateAction();
        return $action->execute(ItemDto::map(json_decode($request->getBody()->getContents(), true)), $id);
    }

    public function delete(ServerRequest $request, int $id): JsonResponse
    {

        if (!$request->getHeader('Authorization') || !AuthService::checkAuth($request->getHeader('Authorization')[0])) {
            return new ErrorResource([
                'data' => [
                    'message' => 'Ошибка авторизации'
                ],
                'status_code' => 'error'
            ]);
        }

        $action = new DeleteAction();
        return $action->execute($id);
    }
}
