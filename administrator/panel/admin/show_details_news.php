<?php
declare(strict_types=1);
include_once "../config/config.php";
checkSession();
include_once "../config/News.php";
$news = new News();
$query = $news->select();
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
        <?php if (isset($_SESSION['update'])): ?>
          <section class="col-6 offset-3 p-3 bg-success mt-4 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['update']; ?>
            </p>
          </section>
        <?php endif; ?>
    </section>
    <section class="row m-0 p-0">
        <?php if (isset($_SESSION['delete'])): ?>
          <section class="col-6 offset-3 p-3 bg-danger mt-5 shadow rounded border">
            <p class="text-center pt-3 text-white">
                <?php echo $_SESSION['delete']; ?>
            </p>
          </section>
        <?php endif; ?>
    </section>
    <section class="row m-0 p-0">
      <section class="col-8 offset-2 mt-5 jumbotron">
        <table class="table table-dark table-bordered table-hover table-responsive">
          <thead>
          <tr>
            <th>title</th>
            <th>description</th>
            <th>keywords</th>
            <th>bodyNews</th>
            <th>delete</th>
            <th>update</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($query as $item): ?>
            <tr>
              <td style=" white-space: nowrap;">
                  <?php echo $item['title']; ?></td>
              <td style=" white-space: nowrap;">
                  <?php echo substr($item['description'], 0, 100); ?></td>
              <td style=" white-space: nowrap;">
                  <?php echo substr($item['keywords'], 0, 100); ?></td>
              <td style="text-align: justify;">
                  <?php echo substr($item['bodyNews'], 0, 500); ?></td>
              <td>
                <form action="news/delete.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                  <input type="submit" value="delete" class="btn btn-danger">
                </form>
              </td>
              <td>
                <a href="edit_news.php?id=<?php echo $item['id'] ?>" class="btn btn-warning">update</a>
              </td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <div>
          <a href="create_news.php" class="btn btn-primary btn-lg mt-4">Back Create News</a>
        </div>
      </section>
    </section>
  </section>
</section>
<!-- =================================== main =================================== -->
<!-- =================================== For remive session =================================== -->
<?php $_SESSION['delete'] = null; ?>
<?php $_SESSION['update'] = null; ?>
<!-- =================================== For remive session =================================== -->
<!-- =================================== link js =================================== -->
<script src="<?php echo URL . JQUERY; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_BUNDLE; ?>"></script>
<script src="<?php echo URL . Bootstrap_Min_JS; ?>"></script>
</body>
</html>