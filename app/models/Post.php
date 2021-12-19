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
        $stm = $this->conn->query('select * from posts');
        if ($stm) {
            $result = $stm->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    
}
