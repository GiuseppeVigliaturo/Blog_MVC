<?php

use App\Controllers\PostController;
use App\DB\DbFactory;

chdir(dirname(__DIR__));
require_once __DIR__ . '/../core/bootstrap.php';
$appConfig = require 'config/app.config.php';
$data = require 'config/database.php';

try {
    $conn = App\DB\DbFactory::create($data)->getConn();
    $router = new Router($conn);

    $router -> loadRoutes($appConfig['routes']);

    
    // $controller = new App\Controllers\PostController($conn);

    //ritorno il postController
    $controller= $router->dispatch();
    $controller->display();

} catch (PDOException $e) {
    die($e->getMessage());
}
