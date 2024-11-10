<?php
include __DIR__ . "/../database/CategoryModel.php";

function index($pdo)
{
$model = new CategoryModel();
return $model->selectAll($pdo);
}

function create()
{
    
}
function store($pdo)
{
    $model = new CategoryModel();
    $model->storeCategory($pdo);
    header('Location: category_index.php');
    exit;
}

function edit($pdo)
{
    $model = new CategoryModel();
    return $model->showCategory($pdo);
}
function update($pdo)
{
    $model = new CategoryModel();
    $model->updateCategory($pdo);
    header('Location: category_index.php');
    exit;
}

function destroy($pdo)
{
    $model = new CategoryModel();
    $model->deleteCategory($pdo);
    header('Location: category_index.php');
    exit;
}