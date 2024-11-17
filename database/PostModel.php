<?php

include 'connection.php';

class PostModel
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAllWithCategories()
    {
        $selectAll = "SELECT * FROM posts LEFT JOIN categories ON categories.id=posts.category_id;";
        $statement = $this->pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function selectPostWithCategories()
    {
        $id = $_GET['id'];
        $query = "SELECT posts.name, categories.name, categories.id FROM posts LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.id='$id' ;";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function selectAllCategories()
    {

        $selectAll = "SELECT id, name FROM categories";
        $statement = $this->pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function updateCategoryInPost()
    {
        $category_id = $_POST['category'];
        $post_id = $_GET['id'];
        $updateCategoryQuery = "UPDATE posts SET category_id='$category_id' WHERE id='$post_id'";
        $statement = $this->pdo->prepare($updateCategoryQuery);
        $statement->execute();
    }

    public function storePost()
    {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $storePost = "INSERT INTO posts (name,content) VALUES ('$name','$content')";
        $statement = $this->pdo->prepare($storePost);
        $statement->execute();
    }

    public function showPost()
    {
        $id = $_GET['id'];
        $showPost = "SELECT * FROM posts LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.id='$id';";
        $showPost .= "UPDATE posts SET look=look+1 WHERE posts.id='$id';";
        $statement = $this->pdo->prepare($showPost);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function updatePost()
    {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $id = $_GET['id'];
        $updatePost = "UPDATE posts SET name='$name', content='$content' WHERE id='$id'";
        $statement = $this->pdo->prepare($updatePost);
        $statement->execute();
    }

    public function deletePost()
    {
        $id = $_GET['id'];
        $deletePost = "DELETE FROM posts WHERE id='$id'";
        $statement = $this->pdo->prepare($deletePost);
        $statement->execute();
    }

    public function showImage()
    {
        $id = $_GET['id'];
        $showQuery = "SELECT name, image FROM posts WHERE posts.id='$id';";
        $statement = $this->pdo->prepare($showQuery);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }

    public function updateImage()
    {
        $img = $_FILES['image'];
        $id = $_GET['id'];

        $allowedFiletypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($img["type"], $allowedFiletypes)) {
            print_r('Можно загружать файлы только в формате: jpg, png');
            exit;
        }

        $fileName = $img['name'];
        $target_dir = __DIR__ . '/../uploads/';
        $target_file = $target_dir . basename($fileName);
        if (!move_uploaded_file($img['tmp_name'], $target_file)) {
            print_r('Ошибка при перемещении файла!');
            exit;
        }

        $query = "UPDATE posts SET image='$fileName' WHERE id='$id'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();

    }

    public function hidePost()
    {
        $id = $_GET['id'];
        $hideQuery = "UPDATE posts SET is_published='0' WHERE id='$id'";
        $statement = $this->pdo->prepare($hideQuery);
        $statement->execute();
    }

    public function revealPost()
    {
        $id = $_GET['id'];
        $revealQuery = "UPDATE posts SET is_published='1' WHERE id='$id'";
        $statement = $this->pdo->prepare($revealQuery);
        $statement->execute();
    }
}



