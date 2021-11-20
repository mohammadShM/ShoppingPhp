<?php
include_once "config/config.php";
checkSession();
include_once 'config/Admin.php';
$admin = new Admin();
$username = $_POST['username'];
$password = $_POST['password'];
$finalPassword = md5($password);
$finalPasswordSafe = sha1($finalPassword);
$query = $admin->selectAdmin();
$flag = false;
foreach ($query as $item) {
    if ($item['username'] === $username && $item['password'] === $finalPasswordSafe) {
        $_SESSION['admin'] = $username;
        header('Location:admin/admin.php');
        $flag = true;
    }
}
if ($flag === false) {
    $_SESSION['wrong'] = "نام کاربری یا کلمه عبور اشتباه می باشد";
    header('Location: login.php');
}
