<?php

include 'connection.php';

class PostModel
{
    public function selectAllWithCategories($pdo)
    {
        $selectAll = "SELECT * FROM posts LEFT JOIN categories ON categories.id=posts.category_id;";
        $statement = $pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function selectPostWithCategories($pdo)
    {
        $id=$_GET['id'];
        $query = "SELECT posts.name, categories.name, categories.id FROM posts LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.id='$id' ;";
        $statement=$pdo->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function selectAllCategories($pdo)
    {

        $selectAll = "SELECT id, name FROM categories";
        $statement = $pdo->prepare($selectAll);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function updateCategoryInPost($pdo)
    {
        $category_id=$_POST['category'];
        $post_id=$_GET['id'];
        $updateCategoryQuery="UPDATE posts SET category_id='$category_id' WHERE id='$post_id'";
        $statement=$pdo->prepare($updateCategoryQuery);
        $statement->execute();
    }
    public function storePost($pdo)
    {
        $name=$_POST['name'];
        $content=$_POST['content'];
        $storePost="INSERT INTO posts (name,content) VALUES ('$name','$content')";
        $statement=$pdo->prepare($storePost);
        $statement->execute();
    }
    public function showPost($pdo)
    {
        $id = $_GET['id'];
        $showPost = "SELECT * FROM posts LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.id='$id';";
        $showPost .= "UPDATE posts SET look=look+1 WHERE posts.id='$id';";
        $statement=$pdo->prepare($showPost);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function updatePost($pdo)
    {
        $name = $_POST['name'];
        $content = $_POST['content'];
        $id = $_GET['id'];
        $updatePost = "UPDATE posts SET name='$name', content='$content' WHERE id='$id'";
        $statement=$pdo->prepare($updatePost);
        $statement->execute();
    }
    public function deletePost($pdo)
    {
        $id=$_GET['id'];
        $deletePost="DELETE FROM posts WHERE id='$id'";
        $statement=$pdo->prepare($deletePost);
        $statement->execute();
    }
    public function showImage($pdo)
    {
        $id = $_GET['id'];
        $showQuery = "SELECT name, image FROM posts WHERE posts.id='$id';";
        $statement=$pdo->prepare($showQuery);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_NUM);
    }
    public function updateImage($pdo)
    {
        $img = $_FILES['image'];
        $id = $_GET['id'];

        $allowedFiletypes = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($img["type"], $allowedFiletypes)) {
            print_r('Можно загружать файлы только в формате: jpg, png');
            exit;
        }

        $fileName=$img['name'];
        $target_dir = __DIR__.'/../uploads/';
        $target_file = $target_dir . basename($fileName);
        if (!move_uploaded_file($img['tmp_name'], $target_file)) {
            print_r('Ошибка при перемещении файла!');
            exit;
        }

        $query = "UPDATE posts SET image='$fileName' WHERE id='$id'";
        $statement = $pdo->prepare($query);
        $statement->execute();

    }
    public function hidePost($pdo)
    {
        $id = $_GET['id'];
        $hideQuery = "UPDATE posts SET is_published='0' WHERE id='$id'";
        $statement=$pdo->prepare($hideQuery);
        $statement->execute();
    }
    public function revealPost($pdo)
    {
        $id = $_GET['id'];
        $revealQuery="UPDATE posts SET is_published='1' WHERE id='$id'";
        $statement=$pdo->prepare($revealQuery);
        $statement->execute();
    }
}

