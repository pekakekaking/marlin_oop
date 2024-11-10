<?php

$id=$_GET['id'];
$name=$items[0][0];
$categoryCurrent=$items[0][1];
$categoryCurrentId=$items[0][2];
$fetchCategories=[];
for ($i=1;$i<count($items);$i++)
{
    $fetchCategories[]=$items[$i];
}