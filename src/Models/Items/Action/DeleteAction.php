<?php

namespace App\Models\Items\Action;

use App\Models\Items\ItemRepository;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;

class DeleteAction
{
    public function execute(int $id)
    {
        try {
            $itemRepository = new ItemRepository();
            $itemEntity = $itemRepository->getById($id);
            $itemRepository->delete($itemEntity);
        } catch (\Exception $e) {
            return new ErrorResource([
                'message' => 'Ошибка удаления',
                'status_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => 'Успешное удаление элемента',
            'status_code' => 'success'
        ]);
    }
}
