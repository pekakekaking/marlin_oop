<?php

$categories=$items;
$group=new CategoryModel($pdo);
$fetchCount=$group->selectPostsCount();
