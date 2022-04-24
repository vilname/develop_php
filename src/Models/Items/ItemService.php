<?php


namespace App\Models\Items;


use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Validation;

class ItemService
{
    public static function validate($entity): ConstraintViolationListInterface
    {
        $validator = Validation::createValidatorBuilder()
            ->addMethodMapping('loadValidatorMetadata')
            ->getValidator();

        return $validator->validate($entity);
    }
}