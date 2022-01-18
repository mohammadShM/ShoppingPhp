<?php
declare(strict_types=1);
include_once "../../config/Seo.php";
include_once "../../config/config.php";
checkSession();
$seo = new Seo();
// variable in request ============================================
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$author = $_POST['author'];
// length in variable ============================================
$titleLength = strlen($title);
$keywordsLength = strlen($keywords);
$descriptionLength = strlen($description);
$authorLength = strlen($author);
// validate data ============================================
if ($title === "" || $titleLength > 100 || $titleLength < 5) {
    echo 1;
    exit;
}
if ($keywords === "" || $keywordsLength > 500 || $keywordsLength < 5) {
    echo 2;
    exit;
}
if ($description === "" || $descriptionLength > 500 || $descriptionLength < 5) {
    echo 3;
    exit;
}
if ($author === "" || $authorLength > 100 || $authorLength < 10) {
    echo 4;
    exit;
}
// insert data ============================================
$seo->insert($title, $keywords, $description, $author);
echo 5;
