<?php
$title = get_sub_field('title');
$slides = get_sub_field('slides');
?>


<div class="development-path">
    <div class="swiper-wrapper">
      <?php foreach ($slides as $key => $value): ?>
          <div class="development-path__panel swiper-slide">
              <div class="container development-path__content">
                  <div class="development-path__title">
                    <?php echo $value['title'] ?>
                  </div>
                  <div class="development-path__year"><?php echo $value['year'] ?></div>
              </div>
          </div>
      <?php endforeach; ?>

    </div>
    <div class="development-path__control">
        <div class="container"><?php echo $title ?></div>
        <div class="development-path__arrows">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-left-thin.svg" alt=""
                 id="development-path-prev"
                 class="swiper-button-next1"/>

            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-right-thin.svg" alt=""
                 id="development-path-next"
                 class="swiper-button-prev1"/>
        </div>
    </div>
</div>

