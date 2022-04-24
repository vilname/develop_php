<?php


namespace App\Models\Items\Action;


use App\Interfaces\ApiResultInterface;
use App\Models\Items\ItemRepository;
use App\Resources\SuccessResource;

class ReadAction implements ApiResultInterface
{
    public function execute(array $itemsEntityDto)
    {
        $itemRepository = new ItemRepository();
        $items = $itemRepository->getItems();

        return new SuccessResource([
            'items' => $items,
            'status_code' => 'success'
        ]);
    }
}