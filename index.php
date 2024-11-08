<?php

//$config = include __DIR__.'/services/config.php';
//include __DIR__.'/services/functions.php';
//include __DIR__.'/database/PostModel.php';

include __DIR__ . '/controllers/PostController.php';

$posts1 = new PostController();
$posts = $posts1->index($pdo);

$routes = [
    "/marlin_oop/" => 'services/config.php',
    "/marlin_oop/about"=>'services/functions.php'
];
$route = $_SERVER['REQUEST_URI'];

dd(array_key_exists($route,$routes));


//$model=new PostModel();
//$posts=$model->selectAllWithCategories($pdo);

include __DIR__ . '/views/index.view.php';

