<?php

use App\Controllers\PostController;
use App\DB\DbFactory;

chdir(dirname(__DIR__));
require_once __DIR__ . '/../core/bootstrap.php';
$appConfig = require 'config/app.config.php';
$data = require 'config/database.php';
$conn = DbFactory::create($data)->getConn();
$router = new Router($conn);

$router -> loadRoutes($appConfig['routes']);

var_dump($router->dispatch());
die;

try {
    
    $controller = new PostController($conn);
    
    $controller->display();
} catch (PDOException $e) {
    die($e->getMessage());
}
