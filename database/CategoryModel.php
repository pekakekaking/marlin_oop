<?php

include 'connection.php';

class CategoryModel
{
    public function selectAll($pdo)
    {
        $selectAll = "SELECT id, name FROM categories;";
        $statement = $pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function selectPostsCount($pdo)
    {
        $selectPostsCount = "SELECT category_id, COUNT(id) as count FROM posts GROUP BY category_id;";
        $statement = $pdo->prepare($selectPostsCount);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);

    }

    public function storeCategory($pdo)
    {
        $name=$_POST['name'];
        $insertQuery="INSERT INTO categories (name) VALUES ('$name')";
        $statement = $pdo->prepare($insertQuery);
        $statement->execute();
    }
    public function showCategory($pdo)
    {
        $id = $_GET['id'];
        $showQuery = "SELECT name FROM categories WHERE id='$id' ";
        $statement = $pdo->prepare($showQuery);
        $statement->execute();
        $res= $statement->fetchAll(PDO::FETCH_NUM);
        return $res[0][0];
    }
    public function updateCategory($pdo)
    {
        $name = $_POST['name'];
        $id = $_GET['id'];
        $insertQuery = "UPDATE categories SET name='$name' WHERE id='$id'";
        $statement = $pdo->prepare($insertQuery);
        $statement->execute();
    }
    public function deleteCategory($pdo)
    {
        $id=$_GET['id'];
        $deleteQuery="DELETE FROM categories WHERE id='$id'";
        $statement = $pdo->prepare($deleteQuery);
        $statement->execute();
    }
}