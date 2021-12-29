<?php

namespace App\Models;

use \PDO;

class Comment
{
    protected $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function all(int $postid)
    {
        $result = [];
        $sql = 'select * from postscomments where post_id=:postid ORDER BY datecreated DESC';

        $stm = $this->conn->prepare($sql);

        $stm->bindParam(':postid', $postid, PDO::PARAM_INT);

        $stm->execute();
        return $stm->fetchAll();
    }
}
