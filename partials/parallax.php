<?php
declare(strict_types=1);
include_once "./administrator/panel/config/Parallax.php";
$parallax = new Parallax();
$query = $parallax->selectLatestId();
?>
<?php if (!empty($query)): ?>
  <section class="parallax" style="background:url('./../assetsAdmin/images/parallax/<?php echo $query['image']; ?>')
      no-repeat fixed center center;background-size: cover;">
    <section class="slogan">
      <h1 style="color:<?php echo $query['colorH1'] ?>;font-size: <?php echo $query['sizeH1'] ?>px;">
          <?php echo $query['title'] ?></h1>
      <p><?php echo $query['description'] ?></p>
    </section>
  </section>
<?php else: ?>
  <section class="parallax">
    <section class="slogan">
      <h1>لورم ایپسوم متن ساختگی با تولید سادگی</h1>
      <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه
        روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف
        بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را
        می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی
        ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد
        وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
        استفاده قرار گیرد.
      </p>
    </section>
  </section>
<?php endif; ?>