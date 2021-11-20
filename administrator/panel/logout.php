<?php
include_once "config/config.php";
checkSession();
$_SESSION['admin'] = null;
$_SESSION['wrong'] = null;
header('Location: login.php');