<?php

//imposto la cartella di riferimento

use App\Controllers\PostController;

chdir(dirname(__DIR__));

require_once __DIR__ . '/../app/Controllers/PostController.php';
require_once __DIR__ . '/../DB/DBPDO.php';
require_once __DIR__ . '/../DB/DbFactory.php';
$data = require 'config/database.php';
try {
    $pdoConn = App\DB\DbFactory::create($data);
    $conn = $pdoConn->getConn();
    $stm = $conn->query('select * from posts', \PDO::FETCH_ASSOC);
    if ($stm) {
        foreach ($stm as $row) {
            print_r($row);
        }
        //per mostrare errori che non sono eccezioni uso else semplicemente
    }else {
        var_dump($conn->errorInfo());
    }
} catch (\PDOException $e) {
    echo $e->getMessage();
}
//die();
$controller = new PostController();
$controller->show(1);
$controller->display();