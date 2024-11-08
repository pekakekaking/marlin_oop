<?php

include 'connection.php';

class PostModel
{
    public function selectAllWithCategories($pdo)
    {
        $selectAll = "SELECT * FROM posts LEFT JOIN categories ON categories.id=posts.category_id;";
        $statement = $pdo->prepare($selectAll);
        $statement->execute();
        $posts = $statement->fetchAll(PDO::FETCH_NUM);
        return $posts;
    }
}

