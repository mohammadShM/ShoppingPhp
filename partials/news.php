<?php
declare(strict_types=1);
include_once "administrator/panel/config/News.php";
$news = new News();
$query = $news->selectLimit(3, 0);
?>
<section class="news">
    <?php foreach ($query as $key => $value): ?>
      <section class="itemNews">
        <div class="divNews">
          <h1><?php echo $value['title']; ?></h1>
          <div class="p"><?php echo $value['bodyNews']; ?></div>
          <a href="news.php?key=<?php echo $value['title']; ?>">ادامه مطالب</a>
        </div>
      </section>
    <?php endforeach; ?>
</section>