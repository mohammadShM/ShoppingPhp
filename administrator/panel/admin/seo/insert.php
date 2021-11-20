<?php
include_once "../../config/Seo.php";
$seo = new Seo();
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$author = $_POST['author'];
$seo->insert($title, $keywords, $description, $author);
echo 1;
