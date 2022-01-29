<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/News.php";
$news = new News();
$id = (int)$_POST['id'];
$title = $_POST['title'];
$keywords = $_POST['keywords'];
$description = $_POST['description'];
$bodyNews = $_POST['bodyNews'];
// for get all post
$titleUnique = $news->select();
// for this post old before change post
$oldPost = $news->selectId($id);
$flag = true;
for ($i = 0; $i < sizeof($titleUnique); $i++) {
    if ($title === $titleUnique[$i]['title'] && $title !== $oldPost['title']) {
        $_SESSION['unique'] = "عنوان شما تکراری می باشد ؛ لطفا عنوان دیگری انتخاب کنید";
        $flag = false;
        header("Location: ../edit_news.php?id=$id");
    }
}
if ($flag === true) {
    $news->update($id, $title, $keywords, $description, $bodyNews);
    $_SESSION['update'] = "عملیات به روزرسانی دیتا با موفقیت انجام شد";
    header('Location: ../show_details_news.php');
}
