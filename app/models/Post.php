<?php

namespace App\Models;

use PDO;

class Post
{
    protected $conn;
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }
    public  function all()
    {
        $result = [];
        $stm = $this->conn->query('select * from posts ORDER BY datecreated DESC');
        if ($stm) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    public  function find(int $id)
    {
        $result = [];
        $stm = $this->conn->prepare('select * from posts where id=:id');
        $stm->execute(['id' => $id]);
        if ($stm) {
            $result = $stm->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
    public function save(array $data = [])
    {
        $sql = 'INSERT INTO posts (title, email,message, datecreated)';
        $sql .= 'values (:title,:email, :message,:datecreated)';

        $stm = $this->conn->prepare($sql);

        $stm->execute([
            'email' => $data['email'],
            'message' =>  $data['message'],
            'title' =>  $data['title'],
            'datecreated' => date('Y-m-d H:i:s')

        ]);

        return $stm->rowCount();
    }

    public function edit(int $postId)
    {
        
    }
}
