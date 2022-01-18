<?php
/** @noinspection JsonEncodingApiUsageInspection */
declare(strict_types=1);
include_once "../config/Seo.php";
//include_once "../config/config.php";
//checkSession();
$seo = new Seo();
$query = $seo->selectSeo();
echo json_encode($query, JSON_UNESCAPED_UNICODE);
