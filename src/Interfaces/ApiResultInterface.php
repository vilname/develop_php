<?php

namespace App\Interfaces;

interface ApiResultInterface
{
    public function execute(DtoInterface $dto);
}