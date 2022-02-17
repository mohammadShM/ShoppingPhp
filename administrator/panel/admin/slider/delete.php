<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/Slider.php";
$slider = new Slider();
$id = (int)$_POST['id'];
$imageDelete = $slider->selectImage($id);
if (file_exists("./../../../../assetsAdmin/images/slider/" . $imageDelete['image'])) {
    unlink("./../../../../assetsAdmin/images/slider/" . $imageDelete['image']);
}
$slider->delete($id);
header('Location: ../show_details_slider.php');
