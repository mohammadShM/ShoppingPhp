<?php
declare(strict_types=1);
include_once "../config/config.php";
checkSession();
$id = (int)$_GET['id'];
include_once "../config/News.php";
$news = new News();
$query = $news->selectId($id);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>آپدیت پارالکس</title>
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
        <?php if (isset($_SESSION['unique'])): ?>
          <section class="col-6 offset-3 p-3 bg-success mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['unique']; ?>
            </p>
          </section>
        <?php endif; ?>
    </section>
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 jumbotron mt-5 shadow">
        <h2 style="padding-bottom: 20px;margin-bottom:25px;border-bottom: 3px solid #716611;">Update news</h2>
        <form action="news/update.php" method="post" enctype="multipart/form-data">
          <section class="form-group">
            <label for="title">title : </label>
            <input type="text" name="title" id="title" value="<?php echo $query['title']; ?>"
                   placeholder="please enter title news" class="form-control">
          </section>
          <section class="form-group">
            <label for="keywords">keywords : </label>
            <textarea name="keywords" id="keywords" style="resize:none;height:100px;"
                      placeholder="please enter keywords news" value=""
                      class="form-control"><?php echo $query['keywords']; ?></textarea>
          </section>
          <section class="form-group">
            <label for="description">description : </label>
            <textarea name="description" id="description" style="resize:none;height:100px;"
                      placeholder="please enter description news" value=""
                      class="form-control"><?php echo $query['description']; ?></textarea>
          </section>
          <section class="form-group">
            <label for="bodyNews">bodyNews : </label>
            <textarea name="bodyNews" id="bodyNews" style="resize:none;height:500px;"
                      placeholder="please enter bodyNews news" value=""
                      class="form-control"><?php echo $query['bodyNews']; ?></textarea>
          </section>
          <input type="hidden" name="id" value="<?php echo $query['id']; ?>">
          <section class="form-group mt-4">
            <div class="col-8 offset-2 mt-4">
              <input type="submit" class="btn btn-primary btn-block" value="update news">
            </div>
          </section>
        </form>
      </section>
    </section>
  </section>
  <!-- =================================== End make form =================================== -->
  <!-- =================================== For remive session =================================== -->
    <?php $_SESSION['unique'] = null; ?>
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