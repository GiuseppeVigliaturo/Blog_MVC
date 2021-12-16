<?php

namespace App\Controllers;

class PostController
{
    protected $layout = 'layout/index.tpl.php';
    public $name = 'Hello World';
    public $content;
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
    public function show(int $postid)
    {
        $message = ' this is a post message';
        //comincia a catturare quell che viene inviato al server
        ob_start();
        require_once __DIR__ . '/../Views/post.tpl.php';
        //una volta importato il layout inietto all'interno quello catturato fino ad ora cioè $message
        $this->content = ob_get_contents();
        ob_end_clean();
    }
}
