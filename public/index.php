<?php

//imposto la cartella di riferimento

use App\Controllers\PostController;

chdir(dirname(__DIR__));

require_once __DIR__."/../app/Controllers/PostController.php";

$controller = new App\Controllers\PostController();

$controller->display();