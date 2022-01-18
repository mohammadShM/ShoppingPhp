<?php
declare(strict_types=1);
include_once "../../config/Seo.php";
include_once "../../config/config.php";
checkSession();
$seo = new Seo();
$id = $_POST['id'];
$seo->deleteSeo($id);
echo 1;