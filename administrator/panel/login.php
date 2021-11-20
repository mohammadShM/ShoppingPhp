<?php
declare(strict_types=1);
include_once "./config/config.php";
include_once "./config/Admin.php";
$admin = new Admin();
session_start();
// for set username and password for admin in first login in the form of automatically
$query = $admin->selectAdmin();
if (empty($query)) {
    $username = "MohammadShM";
    $password = "Moh123654@";
    $finalPassword = md5($password);
    $finalPasswordSafe = sha1($finalPassword);
    $admin->insertAdmin($username, $finalPasswordSafe);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود به مدیریت</title>
    <!-- link css -->
    <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
    <link rel="stylesheet" href="<?php echo URL . Login_Css; ?>">
</head>

<body>
<section class="container-fluid p-0">
    <section class="row m-0 d-flex justify-content-center align-items-center">
        <section class="col-6 p-5 bg-secondary">
            <?php if (isset($_SESSION['admin'])): ?>
                <?php header("Location: admin/admin.php"); ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['wrong'])): ?>
                <h5 class="bg-warning p-3 text-danger text-center">
                    <?php echo $_SESSION['wrong'] ?>
                </h5>
            <?php endif; ?>
            <form action="check.php" method="post">
                <section class="form-group">
                    <label for="username" class="form-label text-white">username</label>
                    <input type="text" name="username" id="username" class="form-control"
                           placeholder="please enter your username ?">
                </section>
                <section class="form-group">
                    <label for="password" class="form-label text-white">password</label>
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="please enter your password ?">
                </section>
                <section class="form-group">
                    <input type="submit" value="login" class="btn btn-success btn-login">
                </section>
            </form>
        </section>
    </section>
</section>
<?php $_SESSION['wrong'] = null; ?>
</body>

</html>