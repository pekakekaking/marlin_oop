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
    $model->storePost();
    header('Location: index');
    exit;
}

function show($pdo)
{
    $model = new PostModel($pdo);
    return $model->showPost();
}

function update($pdo)
{
    $model = new PostModel($pdo);
    $model->updatePost();
    header('Location: index');
    exit;
}

function destroy($pdo)
{
    $model = new PostModel($pdo);
    $model->deletePost();
    header('Location: index');
    exit;
}

function selectCategory($pdo)
{
    $model = new PostModel($pdo);
    $array = $model->selectPostWithCategories();
    $categories = new PostModel($pdo);
    $arrayCat = $categories->selectAllCategories();
    return array_merge($array, $arrayCat);
}

function updateCategoryInPost($pdo)
{
    $model = new PostModel($pdo);
    $model->updateCategoryInPost();
    $post_id=$_GET['id'];
    header("location:category_select.php?id=$post_id");
    exit;
}

function showImage($pdo)
{
    $model = new PostModel($pdo);
    return $model->showImage();
}
function updateImage($pdo)
{
    $model = new PostModel($pdo);
    $model->updateImage();
    $id = $_GET['id'];
    header("Location:image.php?id=$id");
    exit;
}
function hidePost($pdo)
{
    $model = new PostModel($pdo);
    $model->hidePost();
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}

function revealPost($pdo)
{
    $model = new PostModel($pdo);
    $model->revealPost();
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}
