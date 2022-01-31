<?php
declare(strict_types=1);
include_once "administrator/panel/config/News.php";
$news = new News();
$queryAllNews = $news->select();
?>
<!doctype html>
<html lang="fa">
<!-- ======================================== Start make header ======================================== -->
<?php include_once "./_header.php"; ?>
<!-- ======================================== End make header ======================================== -->
<body>
<!-- ======================================== Start make website ======================================== -->
<main class="wrapper">
  <!-- ======================================== Start make menu ======================================== -->
    <?php include_once "./partials/menu.php"; ?>
  <!-- ======================================== End make menu ======================================== -->
  <!-- ======================================== Start make parallax ======================================== -->
    <?php include_once "./partials/parallax.php"; ?>
  <!-- ======================================== End make parallax ======================================== -->
  <!-- ======================================== Start make news ======================================== -->
  <section class="news">
      <?php foreach ($queryAllNews as $key => $value): ?>
        <section class="itemNews">
          <div class="divNews">
            <h1><?php echo $value['title']; ?></h1>
            <div class="p"><?php echo $value['bodyNews']; ?></div>
            <a href="news.php?key=<?php echo $value['title']; ?>">ادامه مطالب</a>
          </div>
        </section>
      <?php endforeach; ?>
  </section>
  <!-- ======================================== End make news ======================================== -->
  <!-- ======================================== Start make footer ======================================== -->
    <?php include_once "./_footer.php"; ?>
  <!-- ======================================== End make footer ======================================== -->
</main>
<!-- ======================================== End make website ======================================== -->
</body>
</html>
