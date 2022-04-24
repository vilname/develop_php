<?php

ini_set("display_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';

use \MiladRahimi\PhpRouter\Router;

$router = Router::create();

$router->post('/api/item', [\App\Controller\v1\ItemController::class, 'create'], 'item_create');
$router->get('/api/item', [\App\Controller\v1\ItemController::class, 'read'], 'item_read');
$router->get('/api/user', [\App\Controller\v1\UserController::class, 'getToken'], 'get_token');

$router->dispatch();
