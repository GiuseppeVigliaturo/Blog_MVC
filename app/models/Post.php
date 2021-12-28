<?php

namespace App\Models;

use PDO;
use PDOException;

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

    public function store(array $data = [])
    {
            $sql = 'UPDATE posts SET email= :email, title=:title, message= :message';
            $sql .= ' WHERE id= :id';

            $stm = $this->conn->prepare($sql);
            // die(print_r($data));
            $stm->execute([
                'id' => $data['id'],
                'email' => $data['email'],
                'title' => $data['title'],
                'message' => $data['message']
            ]);

            // if ($stm->errorCode()) {
            //     return $stm->errorInfo();
            // } else {
            //     
            // }
            return $stm->rowCount();
        
        
    }

    public function delete(int $id)
    {
        $sql = 'DELETE from posts';
        $sql .= ' WHERE id= :id';

        $stm = $this->conn->prepare($sql);
        $stm->bindParam(':id',$id,PDO::PARAM_INT);
        // die(print_r($data));
        $stm->execute();

        
        return $stm->rowCount();
    }
}
