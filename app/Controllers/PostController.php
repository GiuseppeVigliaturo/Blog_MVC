<?php

namespace App\Controllers;

class PostController
{
    protected $layout = 'layout/index.tpl.php';
    public $name = 'Hello World';
    public function __construct()
    {
        echo '<br><br><br><br>';
        echo 'Post controller creato';
    }

    /**
     * @return void
     */
    public function display()
    {
        require  $this->layout;
    }
}
