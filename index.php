<?php

ini_set("display_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';

use \MiladRahimi\PhpRouter\Router;
use Laminas\Diactoros\Response\JsonResponse;

$router = Router::create();

$router->post('/api/item', [\App\Controller\V1\ItemController::class, 'create'], 'item');

$router->dispatch();
