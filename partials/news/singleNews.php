<?php
declare(strict_types=1);
include_once "./administrator/panel/config/News.php";
$news = new News();
$title = $_GET['key'];
$querySingleNews = $news->searchTitle($title);
?>
<section style="width: 100%;padding:50px;box-sizing: border-box;background-color: #DFDFDF;">
  <h1><?php echo $querySingleNews['title']; ?></h1>
  <p><?php echo $querySingleNews['bodyNews']; ?></p>
</section>