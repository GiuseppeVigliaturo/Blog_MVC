<?php

//imposto la cartella di riferimento

use App\Controllers\PostController;

chdir(dirname(__DIR__));

require_once __DIR__ . '/../app/Controllers/PostController.php';
require_once __DIR__ . '/../DB/DBPDO.php';
require_once __DIR__ . '/../DB/DbFactory.php';
$data = require 'config/database.php';
try {
    $controller = new PostController(($pdoConn = App\DB\DbFactory::create($data))->getConn());

    $controller->display();
    // $stm = $conn->query('select * from posts', \PDO::FETCH_ASSOC);
    // if ($stm) {
    //     foreach ($stm as $row) {
    //         print_r($row);
    //     }
    //     //per mostrare errori che non sono eccezioni uso else semplicemente
    // }else {
    //     var_dump($conn->errorInfo());
    // }
} catch (\PDOException $e) {
    echo $e->getMessage();
}
