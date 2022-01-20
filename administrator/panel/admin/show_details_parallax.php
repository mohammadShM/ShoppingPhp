<?php
declare(strict_types=1);
include_once "../config/config.php";
checkSession();
include_once "../config/Parallax.php";
$parallax = new Parallax();
$query = $parallax->select();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>نمایش دیتاهای مربوط به پارالکس</title>
  <!-- =================================== link css =================================== -->
  <link rel="stylesheet" href="<?php echo URL . Bootstrap_Min; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . Admin_Css; ?>"/>
  <link rel="stylesheet" href="<?php echo URL . toastCss; ?>"/>
</head>
<body>
<!-- =================================== main =================================== -->
<section class="contaner-fluid">
    <?php include_once "_menu.php"; ?>
  <section class="data mt-5">
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 mt-5 jumbotron">
        <table class="table table-dark table-bordered table-hover">
          <thead>
          <tr>
            <th>title</th>
            <th>description</th>
            <th>image</th>
            <th>alt</th>
            <th>delete</th>
            <th>update</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($query as $item): ?>
            <tr>
              <td><?php echo $item['title']; ?></td>
              <td><?php echo $item['description']; ?></td>
              <td>
                <img src="./../../../../assetsAdmin/images/parallax/<?php echo $item['image']; ?>"
                     alt="<?php echo $item['alt']; ?>" style="width:60px;height:60px;">
              </td>
              <td><?php echo $item['alt']; ?></td>
              <td>
                <form action="parallax/delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                  <input type="submit" value="delete" class="btn btn-danger">
                </form>
              </td>
              <td>
                <a type="submit" class="btn btn-warning" href="#">update</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </section>
    </section>
  </section>
</section>
<!-- =================================== main =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
</body>
</html>