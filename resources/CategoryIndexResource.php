<?php

$categories=$items;
$group=new CategoryModel();
$fetchCount=$group->selectPostsCount($pdo);
