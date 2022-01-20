<?php
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/Parallax.php";
$parallax = new Parallax();
$id = (int)$_POST['id'];
$imageDelete = $parallax->selectImage($id);
if (file_exists("./../../../../assetsAdmin/images/parallax/" . $imageDelete['image'])) {
    unlink("./../../../../assetsAdmin/images/parallax/" . $imageDelete['image']);
}
$parallax->delete($id);
header('Location: ../show_details_parallax.php');
