<?php
declare(strict_types=1);
include_once "../../config/Link.php";
include_once "../../config/config.php";
checkSession();
$link = new Link();
$id = isset($_POST['id']) && ctype_digit($_POST['id']) ? (int)$_POST['id'] : "null";
if (!empty($id) && is_int($id)) {
    $link->deleteContact($id);
    echo 1;
} else {
    echo 0;
}
header('Location:../show_details_link.php');
