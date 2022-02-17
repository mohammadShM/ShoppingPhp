<?php
declare(strict_types=1);
include_once "administrator/panel/config/Slider.php";
$slider = new Slider();
$query = $slider->select();
?>
<section>
  <!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <?php foreach ($query as $item): ?>
          <div class="swiper-slide">
            <img src="assetsAdmin/images/slider/<?php echo $item['image']; ?>"
                 alt="<?php echo $item['alt']; ?>"/>
            <section>
              <section>
                <h1><?php echo $item['title']; ?></h1>
                <p><?php echo $item['description']; ?></p>
              </section>
            </section>
          </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>

