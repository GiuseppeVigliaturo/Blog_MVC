<?php

namespace App\Controllers;

use App\Models\Post;
use PDO;

class PostController
{
    protected $layout = 'layout/index.tpl.php';
    public $content;
    protected $conn;
    protected $Post;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->Post = new Post($conn);
    }

    public function process()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');
        $tokens = explode('/', $url);

        switch ($tokens[0]) {
            case 'posts':
                $this->content = call_user_func([$this, 'getPosts']);
                break;
            case 'post':
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    $this->content = call_user_func([$this, 'show'], $tokens[1]);
                    break;
                }
        }
    }

    /**
     * @return void
     */
    public function display()
    {
        require $this->layout;
    }
    public function getPosts()
    {
        $posts = $this->Post->all();
        //con compact passiamo un array di posts che sarebbe la varabile $posts = $this->Post->all();
        //Questo perchè viene ciclata nella view
        return view('posts', compact('posts'));
    }
    /**
     * @return string
     */
    public function show(int $postid)
    {
        $message = ' this is a post message';
        ob_start();
        require_once __DIR__ . '/../views/post.tpl.php';
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
