<?php /** @noinspection DuplicatedCode */
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
  <title>ایجاد اسلایدر</title>
  <!-- =================================== link css =================================== -->
  <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . Admin_Css; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . toastCss; ?>"/>
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
        <?php if (isset($_SESSION['title'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-5 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['title']; ?>
            </p>
          </section>
        <?php endif; ?>
        <?php if (isset($_SESSION['description'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['description']; ?>
            </p>
          </section>
        <?php endif; ?>
        <?php if (isset($_SESSION['image'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['image']; ?>
            </p>
          </section>
        <?php endif; ?>
        <?php if (isset($_SESSION['alt'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['alt']; ?>
            </p>
          </section>
        <?php endif; ?>
        <?php if (isset($_SESSION['create'])): ?>
          <section class="col-6 offset-3 p-3 bg-success mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['create']; ?>
            </p>
          </section>
        <?php endif; ?>
    </section>
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 jumbotron mt-5 shadow">
        <h2 style="padding-bottom: 20px;margin-bottom:25px;border-bottom: 3px solid #716611;">Create slider</h2>
        <form action="slider/insert.php" method="post" enctype="multipart/form-data">
          <section class="form-group">
            <label for="title">title in Slider: </label>
            <input type="text" name="title" id="title"
                   placeholder="please enter title slider" class="form-control">
          </section>
          <section class="form-group">
            <label for="description">description in Slider: </label>
            <input name="description" id="description" class="form-control" type="text"
                   placeholder="please enter description slider" value="">
          </section>
          <section class="form-group">
            <label for="image">image in Slider: </label>
            <section class="card p-2">
              <input type="file" name="image" id="image" class="form-control-file border">
            </section>
          </section>
          <section class="form-group">
            <label for="alt">alt for image in Slider: </label>
            <input type="text" name="alt" id="alt"
                   placeholder="please enter alt slider" class="form-control">
          </section>
          <section class="form-group mt-4">
            <input type="submit" class="btn btn-primary" value="create slider">
          </section>
          <section class="form-group mt-4">
            <a type="submit" class="btn btn-success" href="show_details_slider.php">show details slider</a>
          </section>
        </form>
      </section>
    </section>
  </section>
  <!-- =================================== End make form =================================== -->
  <!-- =================================== For remive session =================================== -->
    <?php $_SESSION['title'] = null; ?>
    <?php $_SESSION['description'] = null; ?>
    <?php $_SESSION['image'] = null; ?>
    <?php $_SESSION['alt'] = null; ?>
    <?php $_SESSION['create'] = null; ?>
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