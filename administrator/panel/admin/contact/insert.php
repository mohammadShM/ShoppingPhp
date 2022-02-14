<?php
/** @noinspection NestedPositiveIfStatementsInspection */
declare(strict_types=1);
include_once "../../config/Contact.php";
$contact = new Contact();
$fullName = isset($_POST["fullName"]) ? trim(htmlspecialchars($_POST['fullName'])) : "";
$email = isset($_POST["email"]) ? trim(htmlspecialchars($_POST['email'])) : "";
$comment = isset($_POST["comment"]) ? trim(htmlspecialchars($_POST['comment'])) : "";
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if ($email === false) {
    echo 0;
    exit;
}
if (!empty($fullName) && !empty($email) && !empty($comment)) {
    if (strlen($fullName) >= 5 && strlen($email) >= 10 && strlen($comment) >= 5) {
        if (strlen($fullName) <= 100 && strlen($email) <= 100 && strlen($comment) <= 10000) {
            try {
                $contact->insert($fullName, $email, $comment);
                echo 1;
            } catch (Exception $e) {
                echo 0;
                exit;
            }
        } else {
            echo 0;
            exit;
        }
    } else {
        echo 0;
        exit;
    }
} else {
    echo 0;
    exit;
}
