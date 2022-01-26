<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/News.php";
$news = new News();
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$bodyNews = $_POST['bodyNews'];
$titleUnique = $news->select();
$flag = true;
for ($i = 0; $i < sizeof($titleUnique); $i++) {
    if ($title === $titleUnique[$i]['title']) {
        $_SESSION['unique'] = "عنوان شما تکراری می باشد ؛ لطفا عنوان دیگری انتخاب کنید";
        $flag = false;
        break;
    }
}
if ($flag === true) {
    $news->insert($title, $keywords, $description, $bodyNews);
    $_SESSION['create'] = "عملیات ایجاد دیتا با موفقیت انجام شد";
}
header('Location: ../create_news.php');
