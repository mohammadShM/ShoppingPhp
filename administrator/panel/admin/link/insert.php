<?php
/** @noinspection NestedPositiveIfStatementsInspection */
declare(strict_types=1);
include_once "../../config/config.php";
checkSession();
include_once "../../config/Link.php";
$link = new Link();
$url = isset($_POST["url"]) ? trim(htmlspecialchars($_POST['url'])) : "";
$name = isset($_POST["name"]) ? trim(htmlspecialchars($_POST['name'])) : "";
$url = filter_var($url, FILTER_VALIDATE_URL);
if ($url === false) {
    $_SESSION['error'] = "لینک وارد شده صحیح نمی باشد";
    header("Location: ../create_link.php");
    exit;
}
if (!empty($url) && !empty($name)) {
    if (strlen($url) >= 5 && strlen($name) >= 5) {
        if (strlen($url) <= 100 && strlen($name) <= 100) {
            try {
                $link->insert($url, $name);
                $_SESSION['create'] = "عملیات ایجاد دیتا با موفقیت انجام شد";
                header("Location: ../create_link.php");
                exit;
            } catch (Exception $e) {
                $_SESSION['error'] = "عملیات با خطا مواجه شد ؛ لطفا مجددا تلاش نمایید .";
                header("Location: ../create_link.php");
                exit;
            }
        } else {
            $_SESSION['error'] = "تعداد کاراکترهای لینک و یا نام لینک بیشتر از 100 کاراتر می باشد";
            header("Location: ../create_link.php");
            exit;
        }
    } else {
        $_SESSION['error'] = "تعداد کاراکترهای لینک و یا نام لینک کمتر از 5 کاراتر می باشد";
        header("Location: ../create_link.php");
        exit;
    }
} else {
    $_SESSION['error'] = "لینک و یا نام لینک خالی می باشد";
    header("Location: ../create_link.php");
    exit;
}
