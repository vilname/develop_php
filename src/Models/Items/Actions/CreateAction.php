<?php

namespace App\Models\Items\Actions;

use App\Entity\Item;
use App\Interfaces\ApiResultInterface;
use App\Interfaces\DtoInterface;
use App\Models\Items\Dto\ItemDto;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\ConstraintViolation;

class CreateAction implements ApiResultInterface
{
    public function execute(DtoInterface $dto)
    {
        /** @var ItemDto $dto */

        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();
        $errors = $validator->validate(new Item());

        /** @var ConstraintViolation $error */
        foreach ($errors as $error) {
            $error->getMessage();

            echo '<pre>';
            print_r($error->getPropertyPath());
            echo '</pre>';
        }

        echo '<pre>';
        print_r("2222222222");
        echo '</pre>';
        die();
    }
}