<?php

namespace App\Controllers;

use App\Models\Comment;
use App\Models\Post;
use PDO;
use PDOException;

class PostController extends BaseController
{

    protected $Post;

    public function __construct(PDO $conn)
    {

        parent::__construct($conn);

        $this->Post = new Post($conn);
    }

    private function redirectIfNotLoggedIn()
    {
        if (!isUserLoggedin()) {
            redirect('/auth/login');
        }
    }
    public function display()
    {
        require $this->layout;
    }

    public function getPosts()
    {
        $posts = $this->Post->all();
        $this->content = view('posts', compact('posts'));
    }

    /**
     * @return string
     */
    public function show(int $postid)
    {
        $post = $this->Post->find($postid);
        $comment = new Comment($this->conn);
        $comments = $comment->all($postid);
        $this->content = view('post', compact('post', 'comments'));
    }
    /**
     * @return string
     */
    public function create()
    {
        $this->redirectIfNotLoggedIn();
        $this->content = view('newpost',[]);
    }
    /**
     * @return string
     */
    public function save()
    {
        $this->redirectIfNotLoggedIn();
        $data = $_POST;
        $data['user_id']= getUserId();
        $this->Post->save($data);
        redirect('/');
    }


    public function edit($postId)
    {
        $this->redirectIfNotLoggedIn();
        $post = $this->Post->find($postId);
        $this->content = view('editpost', compact('post'));
    }
    public function store(string $postId)
    {
        $this->redirectIfNotLoggedIn();
        try {
            $this->Post->store($_POST);
            redirect('/');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
        
        
    }
    public function delete($postId)
    {
        $this->redirectIfNotLoggedIn();
        try {
            $this->Post->delete((int)$postId);
            redirect('/');
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }

    public function saveComment($postid)
    {
        $comment = new Comment($this->conn);
        $_POST['postid']= (int)$postid;
        $comments = $comment->save($_POST);
        redirect('/post/'.$postid);
    }
}
