<?php
$title = get_sub_field('title');
$subTitle = get_sub_field('sub_title');
$images = get_sub_field('images');
?>

<section class="sponsor container-xl">
    <div class="container">
        <p class="sponsor__sub-title"><?php echo $subTitle ?></p>
        <p class="sponsor__title">
          <?php echo $title ?>
        </p>
        <div class="swiper sponsor__list">
            <div class="swiper-wrapper">
              <?php foreach ($images as $key => $value): ?>
              <div class="swiper-slide">
                  <img class="" src="<?php echo $value['image']['url'] ?>"/>

              </div>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
