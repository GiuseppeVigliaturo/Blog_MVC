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

    public function save(array $data=[]){
        $sql = 'INSERT INTO postscomments (email, comment, datecreated, post_id)';
        $sql .= 'values (:email, :comment,:datecreated, :post_id)';

        $stm = $this->conn->prepare($sql);

        $stm->execute([
            'email' => $data['email'],
            'comment' =>  $data['comment'],
            'datecreated' => date('Y-m-d H:i:s'),
            'post_id' => $data['postid']
        ]);

        return $stm->rowCount();
    }
}
