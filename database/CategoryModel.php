<?php

include 'connection.php';

class CategoryModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll()
    {
        $selectAll = "SELECT id, name FROM categories;";
        $statement = $this->pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function selectPostsCount()
    {
        $selectPostsCount = "SELECT category_id, COUNT(id) as count FROM posts GROUP BY category_id;";
        $statement = $this->pdo->prepare($selectPostsCount);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);

    }

    public function storeCategory($name)
    {
        $insertQuery = "INSERT INTO categories (name) VALUES ('$name')";
        $statement = $this->pdo->prepare($insertQuery);
        $statement->execute();
    }

    public function showCategory($id)
    {
        $showQuery = "SELECT name FROM categories WHERE id='$id' ";
        $statement = $this->pdo->prepare($showQuery);
        $statement->execute();
        $res = $statement->fetchAll(PDO::FETCH_NUM);
        return $res[0][0];
    }

    public function updateCategory($name,$id)
    {
        $insertQuery = "UPDATE categories SET name='$name' WHERE id='$id'";
        $statement = $this->pdo->prepare($insertQuery);
        $statement->execute();
    }

    public function deleteCategory($id)
    {
        $deleteQuery = "DELETE FROM categories WHERE id='$id'";
        $statement = $this->pdo->prepare($deleteQuery);
        $statement->execute();
    }
}