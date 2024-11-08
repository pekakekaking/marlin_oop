<?php

include __DIR__ . "/../database/PostModel.php";

class PostController
{
    public function index($pdo)
    {
        $model=new PostModel();
        $posts=$model->selectAllWithCategories($pdo);
        return $posts;
    }
}

