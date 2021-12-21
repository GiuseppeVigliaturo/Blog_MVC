<?php

namespace App\Controllers;

use App\Models\Post;
use PDO;

class PostController
{
    protected $layout = 'layout/index.tpl.php';
    public $content = 'Hidran Arias';
    protected $conn;
    protected $Post;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
        $this->Post = new Post($conn);
    }

    public function dispatch()
    {
        $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $url = trim($url, '/');
        $tokens = explode('/', $url);
        $action = $tokens[0];
        $token2 = $tokens[1] ?? '';
        switch ($tokens[0]) {
            case 'posts':
            case '':
            case 'home':
                $this->content = $this->getPosts();
                break;
            case 'post':
                if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                    if ($token2) {
                        if (is_numeric($token2)) {

                            $this->content = $this->show($token2);
                        } else {
                            if (method_exists($this, $token2)) {
                                $this->content = $this->$token2();
                            } else {
                                $this->content = 'Method not found';
                            }
                        }
                    } else {
                        $this->content = 'Method not found';
                    }
                    break;
                } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ($token2) {
                        if (is_numeric($token2)) {

                            // $this->content = $this->update($token2);
                        } else {
                            if (method_exists($this, $token2)) {
                                $this->content = $this->$token2();
                            } else {
                                $this->content = 'Method not found';
                            }
                        }
                    } else {
                        $this->content = 'Method not found';
                    }
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
        return view('posts', compact('posts'));
    }

    /**
     * @return string
     */
    public function show(int $postid)
    {
        $post = $this->Post->find($postid);
        return view('post', compact('post'));
    }
    /**
     * @return string
     */
    public function create()
    {

        return view('newpost',[]);
    }
    /**
     * @return string
     */
    public function save()
    {

        $this->Post->save($_POST);
    }
}
