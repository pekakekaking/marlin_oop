<?php

$routes = [
    "/index" => [__DIR__ . '/../controllers/PostController.php', 'index', __DIR__ . '/../views/index.view.php'],
    "/create.php" => [__DIR__ . '/../controllers/PostController.php', 'create', __DIR__ . '/../views/create.view.php'],
    "/store.php" => [__DIR__ . '/../controllers/PostController.php', 'store', null],
    "/show.php" => [__DIR__ . '/../controllers/PostController.php', 'show', __DIR__ . '/../views/show.view.php'],
    "/edit.php" => [__DIR__ . '/../controllers/PostController.php', 'show', __DIR__ . '/../views/edit.view.php'],
    "/update.php" => [__DIR__ . '/../controllers/PostController.php', 'update', null],
    "/destroy.php" => [__DIR__ . '/../controllers/PostController.php', 'destroy', null],
    "/category_select.php" => [__DIR__ . '/../controllers/PostController.php', 'selectCategory',  __DIR__ . '/../views/selectcategory.view.php'],
    "/update_category_in_post.php" => [__DIR__ . '/../controllers/PostController.php', 'updateCategoryInPost',  null],
    "/image.php" => [__DIR__ . '/../controllers/PostController.php', 'showImage',  __DIR__ . '/../views/image.view.php'],
    "/image_update.php" => [__DIR__ . '/../controllers/PostController.php', 'updateImage',  null],
    "/hide_post.php" => [__DIR__ . '/../controllers/PostController.php', 'hidePost',  null],
    "/reveal_post.php" => [__DIR__ . '/../controllers/PostController.php', 'revealPost',  null],

];

$uri = $_SERVER['REQUEST_URI'];
$arrayLink = explode('?', $uri);
$route = $arrayLink[0];

if (array_key_exists($route, $routes)) {
    include $routes[$route][0];
    $items = call_user_func($routes[$route][1], $pdo);
    include $routes[$route][2];

} else {
    var_dump(404);
}





