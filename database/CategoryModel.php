<?php

include 'connection.php';

class CategoryModel
{
    public function selectAll($pdo)
    {

        $selectAll = "SELECT id, name FROM categories";
        $statement = $pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
}