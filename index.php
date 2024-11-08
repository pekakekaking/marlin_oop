<?php

//$config = include __DIR__.'/services/config.php';
//include __DIR__.'/services/functions.php';
//include __DIR__.'/database/PostModel.php';

include __DIR__.'/controllers/PostController.php';

$posts1=new PostController();
$posts=$posts1->index($pdo);





//$model=new PostModel();
//$posts=$model->selectAllWithCategories($pdo);

include __DIR__.'/views/index.view.php';

