<?php
declare(strict_types=1);
include_once "../../config/Parallax.php";
$parallax = new Parallax();
$title = $_POST['title'];
$description = $_POST['description'];
$image = $_FILES['image'];
if ($title === "" || strlen($title) > 100 || strlen($title) < 5) {
    $_SESSION['title'] = "مقدار عنوان یا خالی می باشد یا بیشتر از 100 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_parallax.php');
}
if ($description === "" || strlen($description) > 10000 || strlen($description) < 5) {
    $_SESSION['description'] = "مقدار توضیحات یا خالی می باشد یا بیشتر از 10000 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_parallax.php');
}
$extension = pathinfo($image['name'], PATHINFO_EXTENSION);
if (empty($image['name']) || $image['size'] > 5242881) {
    $_SESSION['image'] = "عکس شما یا خالی می باشد و یا بیشتر از 5 مگابایت می باشد و
     یا فرمت صحیح عکس نمی باشد . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_parallax.php');
}
if ($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg") {
    $_SESSION['image'] = "عکس شما یا خالی می باشد و یا بیشتر از 5 مگابایت می باشد و
     یا فرمت صحیح عکس نمی باشد . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_parallax.php');
}
$image_name = $parallax->uploadImage($image);
$parallax->insert($title, $description, $image_name);
$_SESSION['create'] = "عملیات ایجاد دیتا با موفقیت انجام شد";
header('Location: ../create_parallax.php');
// 41943041 bit === 5 mega bite
// 5242881 bite === 5 mega bite