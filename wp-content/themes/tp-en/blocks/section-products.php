<?php
$title = get_sub_field('title');
$sub_title = get_sub_field('sub_title');
$products = get_sub_field('product');

?>


<section class="product-section">
  <div class="">
      <div class="section-title text-center  container">
            <div class="sub-title sponsor__sub-title"><?php echo $sub_title ?></div>
            <div class="title sponsor__title"><?php echo $title ?></div>
        </div>

    <?php
    if ($products) { ?>
      <div class="app-slider-container ">
        <div class="swiper app-slider ">
          <div class="swiper-wrapper">
            <?php
            foreach ($products as $product) {
              $logo = $product['image_logo'];
              $app_name = $product['name'];
              $description = $product['description'];
              $bg_url = $product['background_image'];
              $image_app = $product['image_app'];
              $ch_play_url = $product['ch_play']['url'] ?? '';
              $ios = $product['ios']['url'] ?? '';
              $text_color = $product['text_color'];
              $no_padding_right = $product['no_padding_right'];
              

              ?>
              <div
                class="app-item <?php echo $text_color?> swiper-slide padding-right-<?php echo $no_padding_right?> "
                >
                <img src="<?php echo esc_url($bg_url); ?>" class="bg-image" />
                <!-- Text Section -->
                <div class="inner">
                <div class="flex-1 space-y-4 bg-white/70 p-4 rounded-xl text">
                  <div class="app-logo">
                    <?php if ($logo): ?>
                        <img src="<?php echo esc_url($logo); ?>" alt="<?php echo esc_attr($app_name); ?>"
                          class="w-10 h-10 object-contain" />
                      <?php endif; ?>
                  </div>
                  <div class="app-content">
                    <h3 class="app-name"><?php echo esc_html($app_name); ?></h3>
                    <p class="app-des">
                      <?php echo esc_html($description); ?>
                    </p>
                  </div>
                  <div class="flex gap-4">
                    <?php if ($ch_play_url): ?>
                      <a href="<?php echo esc_url($ch_play_url); ?>" target="_blank" class="inline-block">
                      <img src="/wp-content/uploads/2025/05/Google_Play_Store_badge_EN.svg"
                        alt="Tải trên Google Play"  />
                    </a>
                    <?php endif; ?>

                    <?php if ($ios): ?>
                      <a href="<?php echo esc_url($ios); ?>" target="_blank" class="inline-block">
                      <img src="/wp-content/uploads/2025/05/download-on-the-app-store.svg"
                        alt="Tải trên IOS"  />
                    </a>
                    <?php endif; ?>
                    
                   
                  </div>
                </div>

                <!-- Image Section -->
                <div class="image">
                  <img src="<?php echo esc_url($image_app); ?>" alt="<?php echo esc_attr($app_name); ?> preview"
                    class="rounded-xl shadow-md w-full max-w-xs mx-auto" />
                </div>
                </div>
              </div>


              <?php
            }

            ?>

          </div>
          <div class="swiper-button-prev" style="opacity:0"></div>
          <div class="swiper-button-next" style="opacity:0"></div>
        </div>

      </div>
    <?php }
    ?>


  </div>
</section>