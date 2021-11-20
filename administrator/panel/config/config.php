<?php /** @noinspection PhpDefineCanBeReplacedWithConstInspection */
// const variable and other address bootstrap , jquery .......
define('URL', 'http://shoppingphp.mytest');
// address css login and .... ===========================================
define('Login_Css', '/administrator/css/login.css');
define('Admin_Css', '/administrator/css/admin.css');
// address bootstrap and jquery ===========================================
define('Bootstrap_Min', '/node_modules/bootstrap/dist/css/bootstrap.min.css');
define('Bootstrap_Min_JS', '/node_modules/bootstrap/dist/js/bootstrap.min.js');
define('Bootstrap_Min_BUNDLE', '/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js');
define('JQUERY', '/node_modules/jquery/dist/jquery.min.js');
// session and check session admin ===========================================
function checkSession()
{
    session_start();
    if (!isset($_SESSION['admin'])) {
        header('Location: ../login.php');
    }
}
