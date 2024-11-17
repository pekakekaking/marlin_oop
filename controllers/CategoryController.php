<?php
include __DIR__ . "/../database/CategoryModel.php";

function index($pdo)
{
$model = new CategoryModel($pdo);
return $model->selectAll();
}

function create()
{
    
}
function store($pdo)
{
    $model = new CategoryModel($pdo);
    $model->storeCategory();
    header('Location: category_index.php');
    exit;
}

function edit($pdo)
{
    $model = new CategoryModel($pdo);
    return $model->showCategory();
}
function update($pdo)
{
    $model = new CategoryModel($pdo);
    $model->updateCategory();
    header('Location: category_index.php');
    exit;
}

function destroy($pdo)
{
    $model = new CategoryModel($pdo);
    $model->deleteCategory();
    header('Location: category_index.php');
    exit;
}