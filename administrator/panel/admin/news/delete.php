<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/News.php";
$news = new News();
$id = (int)$_POST['id'];
$news->delete($id);
$_SESSION['delete'] = "عملیات حذف با موفقیت انجام شد.";
header('Location: ../show_details_news.php');
