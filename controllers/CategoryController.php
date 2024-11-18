<?php
include __DIR__ . "/../database/CategoryModel.php";

function index($pdo)
{
$model = new CategoryModel($pdo);
$table='categories';
return $model->selectAll($table);
}

function create()
{
    
}
function store($pdo)
{
    $model = new CategoryModel($pdo);
    $model->storeCategory($_POST['name']);
    header('Location: category_index.php');
    exit;
}

function edit($pdo)
{
    $model = new CategoryModel($pdo);
    return $model->showCategory($_GET['id']);
}
function update($pdo)
{
    $model = new CategoryModel($pdo);
    $model->updateCategory($_POST['name'],$_GET['id']);
    header('Location: category_index.php');
    exit;
}

function destroy($pdo)
{
    $model = new CategoryModel($pdo);
    $table='categories';
    $model->delete($table,$_GET['id']);
    header('Location: category_index.php');
    exit;
}