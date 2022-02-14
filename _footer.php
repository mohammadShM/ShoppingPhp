<?php
declare(strict_types=1);
include_once "administrator/panel/config/Link.php";
$link = new Link();
$query = $link->selectLimit(4, 0);
?>
<footer>
  <section class="link">
    <!--<a href="#">لینک های مرتبط</a>-->
    <!--<a href="#">لینک های مرتبط</a>-->
    <!--<a href="#">لینک های مرتبط</a>-->
    <!--<a href="#">لینک های مرتبط</a>-->
      <?php foreach ($query as $item): ?>
        <a href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['name']; ?></a>
      <?php endforeach; ?>
  </section>
  <section class="social">
    <a href="#"><i class="fab fa-telegram-plane"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
    <a href="#"><i class="fab fa-youtube"></i></a>
  </section>
  <section class="address">
    <form action="#" method="post">
      <!--suppress HtmlFormInputWithoutLabel -->
      <input type="text" name="search" placeholder="جستجو ....">
      <button type="submit">جستجو</button>
    </form>
  </section>
</footer>