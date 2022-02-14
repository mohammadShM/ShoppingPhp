<?php
declare(strict_types=1);
include_once "../../config/Contact.php";
include_once "../../config/config.php";
checkSession();
$contact = new Contact();
$id = isset($_POST['id']) && ctype_digit($_POST['id']) ? (int)$_POST['id'] : "null";
if (!empty($id) && is_int($id)) {
    $contact->deleteContact($id);
    echo 1;
} else {
    echo 0;
}
header('Location:../show_details_contact.php');
