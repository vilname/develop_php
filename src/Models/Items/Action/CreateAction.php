<?php

namespace App\Models\Items\Action;

use App\Interfaces\ApiResultInterface;
use App\Interfaces\DtoInterface;
use App\Models\Items\Dto\ItemDto;
use App\Models\Items\ItemRepository;
use App\Models\Items\ItemService;
use App\Resources\ErrorResource;
use App\Resources\SuccessResource;
use Laminas\Diactoros\Response\JsonResponse;
use Symfony\Component\Validator\ConstraintViolation;

class CreateAction implements ApiResultInterface
{
    /**
     * @param DtoInterface[] $itemsEntityDto
     * @return JsonResponse
     */
    public function execute(array $itemsEntityDto): JsonResponse
    {
        /** @var ItemDto $field */
        try {
            $resultError = [];
            foreach ($itemsEntityDto as $field) {
                $errors = ItemService::validate($field);

                /** @var ConstraintViolation $error */
                foreach ($errors as $error) {
                    $resultError[] = $error->getPropertyPath().": ".$error->getMessage();
                }
            }

            if ($resultError) {
                return new ErrorResource(['message' => $resultError]);
            }

            $itemRepository = new ItemRepository();
            $itemRepository->massAdd($itemsEntityDto);
        } catch (\Exception $e) {
            return new ErrorResource([
                'data' => [
                    'message' => $e->getMessage()
                ],
                'error_code' => 'error'
            ]);
        }

        return new SuccessResource([
            'data' => [
                'message' => 'Данные успешно сохранены'
            ],
            'error_code' => 'success'
        ]);
    }
}
