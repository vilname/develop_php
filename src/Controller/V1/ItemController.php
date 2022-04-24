<?php

namespace App\Controller\V1;

use App\Models\Items\Actions\CreateAction;
use App\Models\Items\Dto\ItemDto;
use Laminas\Diactoros\ServerRequest;
use Symfony\Component\Validator\ValidatorBuilder;

class ItemController
{
    public function create(ServerRequest $request)
    {
        $action = new CreateAction();
        $action->execute(ItemDto::map(json_decode($request->getBody()->getContents(), true)));

//        $v = new ValidatorBuilder();
//        $validator = $v->getValidator();
//        $validator->
//        $errors = $validator->validate(json_decode($request->getBody()->getContents(), true));

        echo '<pre>';
        print_r('2222222222');
        echo '</pre>';
        die();
    }
}