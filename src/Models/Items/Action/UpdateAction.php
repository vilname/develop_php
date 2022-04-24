<?php

namespace App\Models\Items\Action;

use App\Models\Items\Dto\ItemDto;
use App\Models\Items\ItemRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;

class UpdateAction
{
    public function execute(ItemDto $itemDto, int $id): JsonResponse
    {
        try {
            $itemRepository = new ItemRepository();
            $itemEntity = $itemRepository->getById($id);
            $itemRepository->add($itemEntity, $itemDto);
        } catch (\Exception $e) {
            return new ErrorResource([
                'message' => 'Ошибка изменения',
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
           'data' => 'Успешное изменение элемента',
           'status_code' => 'success'
        ]);
    }
}
