<?php

include __DIR__ . "/../database/PostModel.php";


function index($pdo)
{
    $model = new PostModel($pdo);
    return $model->selectAllWithCategories();
}

function create()
{

}

function store($pdo)
{
    $model = new PostModel($pdo);
    $model->storePost($_POST['name'],$_POST['content']);
    header('Location: index');
    exit;
}

function show($pdo)
{
    $model = new PostModel($pdo);
    return $model->showPost($_GET['id']);
}

function update($pdo)
{
    $model = new PostModel($pdo);
    $model->updatePost($_POST['name'],$_POST['content'],$_GET['id']);
    header('Location: index');
    exit;
}

function destroy($pdo)
{
    $model = new PostModel($pdo);
    $model->deletePost($_GET['id']);
    header('Location: index');
    exit;
}

function selectCategory($pdo)
{
    $model = new PostModel($pdo);
    $array = $model->selectPostWithCategories($_GET['id']);
    $categories = new PostModel($pdo);
    $arrayCat = $categories->selectAllCategories();
    return array_merge($array, $arrayCat);
}

function updateCategoryInPost($pdo)
{
    $model = new PostModel($pdo);
    $model->updateCategoryInPost($_POST['category'],$_GET['id']);
    $post_id=$_GET['id'];
    header("location:category_select.php?id=$post_id");
    exit;
}

function showImage($pdo)
{
    $model = new PostModel($pdo);
    return $model->showImage($_GET['id']);
}
function updateImage($pdo)
{
    $model = new PostModel($pdo);
    $id = $_GET['id'];
    $model->updateImage($_FILES['image'],$id);
    header("Location:image.php?id=$id");
    exit;
}
function hidePost($pdo)
{
    $model = new PostModel($pdo);
    $model->hidePost($_GET['id']);
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}

function revealPost($pdo)
{
    $model = new PostModel($pdo);
    $model->revealPost($_GET['id']);
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}
