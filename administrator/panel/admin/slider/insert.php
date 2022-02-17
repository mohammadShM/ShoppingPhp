<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/Slider.php";
$slider = new Slider();
$title = $_POST['title'];
$alt = $_POST['alt'];
$description = $_POST['description'];
$image = $_FILES['image'];
$flag = true;
$_SESSION['titleMe'] = "مقدار عنوان یا خالی می باشد یا بیشتر از 200 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
if ($title === "" || strlen($title) > 200 || strlen($title) < 5) {
    $flag = false;
    $_SESSION['title'] = "مقدار عنوان یا خالی می باشد یا بیشتر از 200 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_slider.php');
    exit;
}
if ($alt === "" || strlen($alt) > 200 || strlen($alt) < 5) {
    $flag = false;
    $_SESSION['alt'] = "مقدار سئو عکس یا خالی می باشد یا بیشتر از 200 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_slider.php');
    exit;
}
if ($description === "" || strlen($description) > 8000 || strlen($description) < 5) {
    $flag = false;
    $_SESSION['description'] = "مقدار توضیحات یا خالی می باشد یا بیشتر از 8000 کاراکتر می باشد یا کمتر از 5 کاراکتر می باشد
     . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_slider.php');
    exit;
}
$extension = pathinfo($image['name'], PATHINFO_EXTENSION);
if (empty($image['name']) || $image['size'] > 5242881) {
    $flag = false;
    $_SESSION['image'] = "عکس شما یا خالی می باشد و یا بیشتر از 5 مگابایت می باشد و
     یا فرمت صحیح عکس نمی باشد . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_slider.php');
    exit;
}
if ($extension !== "jpg" && $extension !== "png" && $extension !== "jpeg") {
    $flag = false;
    $_SESSION['image'] = "عکس شما یا خالی می باشد و یا بیشتر از 5 مگابایت می باشد و
     یا فرمت صحیح عکس نمی باشد . لطفا مجددا تلاش نمایید . با تشکر";
    header('Location: ../create_slider.php');
    exit;
}
if ($flag === true) {
    $image_name = $slider->uploadImage($image, "slider", "Slider_");
    $slider->insert($image_name,$alt, $title,  $description);
    $_SESSION['create'] = "عملیات ایجاد دیتا با موفقیت انجام شد";
    header('Location: ../create_slider.php');
    exit;
}
// header('Location: ../create_slider.php');
// 41943041 bit === 5 mega bite
// 5242881 bite === 5 mega bite