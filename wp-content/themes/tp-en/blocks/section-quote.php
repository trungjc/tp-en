<?php
$item = get_sub_field('item');
?>

<section class="container">
    <!-- Slider main container -->
    <div class="quote">
        <div class="quote-swiper swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
              <?php foreach ($item as $key => $value): ?>
                  <div class="swiper-slide">
                      <div class="swiper-slide__content">
                          <p>
                            <?php echo $value['content'] ?>
                          </p>
                        <?php if ( $value['name'] ) : ?>
                            <div class="swiper-slide__break"></div>
                            <div class="swiper-slide__author">
                                <img src=" <?php echo $value['image']['url'] ?>" alt=""/>
                                <div class="swiper-slide__info">
                                    <p class="font-bold text-4xl sm:text-2xl">
                                      <?php echo $value['name'] ?>
                                    </p>
                                    <p class="text-2xl text-gray-400"> <?php echo $value['role'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>


                      </div>
                  </div>
              <?php endforeach; ?>

            </div>

            <div class="swiper-pagination"></div>
            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>




