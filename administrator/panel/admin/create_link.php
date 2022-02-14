<?php
declare(strict_types=1);
include_once "../config/config.php";
checkSession();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ایجاد لینک</title>
  <!-- =================================== link css =================================== -->
  <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . Admin_Css; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . toastCss; ?>"/>
  <script src="https://cdn.tiny.cloud/1/zykcdvg859mggsxd8w1of22bn6a9ab8hielth8gnorsgpne9/tinymce/5/tinymce.min.js"
          referrerpolicy="origin"></script>
  <script>
      tinymce.init({
          selector: 'textarea#bodyNews'
      });
  </script>
</head>
<body>
<!-- =================================== Start make template =================================== -->
<section class="container-fluid p-0 m-0">
  <!-- =================================== Start make menu =================================== -->
    <?php include_once "_menu.php"; ?>
  <!-- =================================== End make menu =================================== -->
  <!-- =================================== Start make form =================================== -->
  <section class="data mt-5">
    <section class="row m-0 p-0">
        <?php if (isset($_SESSION['create'])): ?>
          <section class="col-6 offset-3 p-3 bg-success mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['create']; ?>
            </p>
          </section>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['error']; ?>
            </p>
          </section>
        <?php endif; ?>
    </section>
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 jumbotron mt-5 shadow">
        <h2 style="padding-bottom: 20px;margin-bottom:25px;border-bottom: 3px solid #716611;">Create link</h2>
        <form action="link/insert.php" method="post" enctype="multipart/form-data">
          <section class="form-group">
            <label for="url">url : </label>
            <input type="text" name="url" id="url"
                   placeholder="please enter url link" class="form-control">
          </section>
          <section class="form-group">
            <label for="name">name url : </label>
            <input name="name" id="name" type="text"
                   placeholder="please enter name url link" value="" class="form-control">
          </section>
          <section class="form-group mt-4">
            <input type="submit" class="btn btn-primary" value="create link">
          </section>
          <section class="form-group mt-4">
            <a type="submit" class="btn btn-success" href="show_details_link.php">show details link</a>
          </section>
        </form>
      </section>
    </section>
  </section>
  <!-- =================================== End make form =================================== -->
  <!-- =================================== For remive session =================================== -->
    <?php $_SESSION['create'] = null; ?>
    <?php $_SESSION['error'] = null; ?>
  <!-- =================================== For remive session =================================== -->
</section>
<!-- =================================== End make template =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
<script src="<?php echo URL . toastJs; ?>"></script>
</body>
</html>