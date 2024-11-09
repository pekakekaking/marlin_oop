<?php

include __DIR__ . "/../database/PostModel.php";


function index($pdo)
{
    $model = new PostModel();
    return $model->selectAllWithCategories($pdo);
}

function create()
{

}

function store($pdo)
{
    $model = new PostModel();
    $model->storePost($pdo);
    header('Location: index');
    exit;
}

function show($pdo)
{
    $model = new PostModel();
    return $model->showPost($pdo);
}

function update($pdo)
{
    $model = new PostModel();
    $model->updatePost($pdo);
    header('Location: index');
    exit;
}

function destroy($pdo)
{
    $model = new PostModel();
    $model->deletePost($pdo);
    header('Location: index');
    exit;
}

function selectCategory($pdo)
{
    $model = new PostModel();
    $array = $model->selectPostWithCategories($pdo);
    $categories = new PostModel();
    $arrayCat = $categories->selectAllCategories($pdo);
    return array_merge($array, $arrayCat);
}

function updateCategoryInPost($pdo)
{
    $model = new PostModel();
    $model->updateCategoryInPost($pdo);
    $post_id=$_GET['id'];
    header("location:category_select.php?id=$post_id");
    exit;
}

function showImage($pdo)
{
    $model = new PostModel();
    return $model->showImage($pdo);
}
function updateImage($pdo)
{
    $model = new PostModel();
    $model->updateImage($pdo);
    $id = $_GET['id'];
    header("Location:image.php?id=$id");
    exit;
}
function hidePost($pdo)
{
    $model = new PostModel();
    $model->hidePost($pdo);
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}

function revealPost($pdo)
{
    $model = new PostModel();
    $model->revealPost($pdo);
    $id = $_GET['id'];
    header("Location:show.php?id=$id");
    exit;
}
